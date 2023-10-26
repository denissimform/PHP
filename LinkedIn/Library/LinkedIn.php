<?php
# email: viltegurta@tozya.com
# password: Test@123

namespace LinkedIn;

use CURLFile;
use Exception;

class LinkedIn
{
    # linkedin application credentials
    private $CLIENT_ID;
    private $CLIENT_SECRET;
    private $REDIRECT_URL;

    function __construct($client_id, $client_secret, $redirect_url)
    {
        $this->CLIENT_ID = $client_id;
        $this->CLIENT_SECRET = $client_secret;
        $this->REDIRECT_URL = $redirect_url;
    }

    #  curl operation
    private function curl($url, $method = "GET", $headers = [], $body = [], $flag = false)
    {
        try {

            #  initialize curl handler
            $curl = curl_init($url);

            #  set curl option
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, $flag);

            #  execute curl
            $res = curl_exec($curl);

            #  close curl connection
            curl_close($curl);

            return json_decode($res);
        } catch (Exception $err) {
            return "Error: " . $err->getMessage() . " at line " . $err->getLine();
        }
    }

    # generate token
    public function generateToken($code)
    {
        $url = "https://www.linkedin.com/oauth/v2/accessToken?code=$code&grant_type=authorization_code&client_id=$this->CLIENT_ID&client_secret=$this->CLIENT_SECRET&redirect_uri=$this->REDIRECT_URL";

        $headers = ["Content-Type: application/json"];

        $res = $this->curl($url, "GET", $headers, [], true);

        return $res->access_token;
    }

    #  get profile data
    public function getProfileData($token)
    {
        $url = "https://api.linkedin.com/v2/me?projection=(id,localizedLastName,localizedFirstName,profilePicture(displayImage~digitalmediaAsset:playableStreams))";

        $headers = [
            "Content-Type: application/json",
            "Authorization: Bearer $token"
        ];

        $res = $this->curl($url, "GET", $headers, [], true);

        return [
            "id" => $res->id,
            "profilePicture" => $res->profilePicture->{'displayImage~'}->elements[1]->identifiers[0]->identifier,
            "firstName" => $res->localizedFirstName,
            "lastName" => $res->localizedLastName,
        ];
    }

    #  post text on linkedin
    public function postTextOnLinkedIn($id, $token, $text)
    {
        $url = "https://api.linkedin.com/v2/ugcPosts";

        $headers = [
            "Content-Type: application/json",
            "Authorization: Bearer $token"
        ];

        $body = '{
            "author": "urn:li:person:' . $id . '",
            "lifecycleState": "PUBLISHED",
            "specificContent": {
                "com.linkedin.ugc.ShareContent": {
                    "shareCommentary": {
                        "text": "' . $text . '"
                    },
                    "shareMediaCategory": "NONE"
                }
            },
            "visibility": {
                "com.linkedin.ugc.MemberNetworkVisibility": "PUBLIC"
            }
        }';

        $res = $this->curl($url, "POST", $headers, $body, true);

        return $res;
    }


    # post article on linkedin
    public function postArticleOnLinkedIn($id, $token, $data)
    {
        $url = "https://api.linkedin.com/v2/ugcPosts";

        $headers = [
            "Content-Type: application/json",
            "Authorization: Bearer $token"
        ];

        $body = '{
            "author": "urn:li:person:' . $id . '",
            "lifecycleState": "PUBLISHED",
            "specificContent": {
                "com.linkedin.ugc.ShareContent": {
                    "shareCommentary": {
                        "text": "' . $data['text'] . '"
                    },
                    "shareMediaCategory": "ARTICLE",
                    "media": [
                        {
                            "status": "READY",
                            "description": {
                                "text": "' . $data['desc'] . '"
                            },
                            "originalUrl": "' . $data['url'] . '",
                            "title": {
                                "text": "' . $data['title'] . '"
                            }
                        }
                    ]
                }
            },
            "visibility": {
                "com.linkedin.ugc.MemberNetworkVisibility": "PUBLIC"
            }
        }';

        $res = $this->curl($url, "POST", $headers, $body, true);

        return $res;
    }

    #  post on linkedin
    public function postOnLinkedIn($id, $token, $data, $file)
    {
        #   store media of all files
        $media = [];

        #   upload all file 
        foreach ($file['img']['tmp_name'] as $file) {

            /***************** Register image *****************/
            $image_register_url = "https://api.linkedin.com/v2/assets?action=registerUpload";

            $headers = [
                "Content-Type: application/json",
                "Authorization: Bearer $token"
            ];

            $body = '
                {
                    "registerUploadRequest": {
                        "recipes": [
                            "urn:li:digitalmediaRecipe:feedshare-image" 
                        ],
                        "owner": "urn:li:person:' . $id . '",
                        "serviceRelationships": [
                            {
                                "relationshipType": "OWNER",
                                "identifier": "urn:li:userGeneratedContent"
                            }
                        ]
                    }
                }
            ';
            $res = $this->curl($image_register_url, "POST", $headers, $body, true);

            #   media asset for further api call
            $media_asset = $res->value->asset;

            /***************** Upload image on register image url  *****************/
            #   url for upload image which get from image register api
            $url = $res->value->uploadMechanism->{'com.linkedin.digitalmedia.uploading.MediaUploadHttpRequest'}->uploadUrl;

            $headers = [
                "Content-Type: multipart/form-data",
                "Authorization: Bearer $token"
            ];

            $body = new CURLFile($file);

            # upload image on file
            $this->curl($url, "POST", $headers, ["file" => $body], false);


            array_push($media, [
                "status" => "READY",
                "description" => [
                    "text" => $data['desc']
                ],
                "media" => $media_asset,
                "title" => [
                    "text" => $data['title']
                ]
            ]);
        }

        /***************** Post on Linkedin *****************/
        #   url for post on linkedin
        $url = "https://api.linkedin.com/v2/ugcPosts";

        $body = '
        {
            "author": "urn:li:person:' . $id . '",
            "lifecycleState": "PUBLISHED",
            "specificContent": {
                "com.linkedin.ugc.ShareContent": {
                    "shareCommentary": {
                        "text": "' . $data['desc'] . '"
                    },
                    "shareMediaCategory": "IMAGE",
                    "media": ' . json_encode($media) . '
                }
            },
            "visibility": {
                "com.linkedin.ugc.MemberNetworkVisibility": "PUBLIC"
            }
        }';

        $headers = [
            "Content-Type: application/json",
            "Authorization: Bearer $token"
        ];

        $res = $this->curl($url, "POST", $headers, $body, true);

        return $res;
    }
}
