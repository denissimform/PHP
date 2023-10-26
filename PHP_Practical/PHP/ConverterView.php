<?php

class ConverterView
{
    // return the html code for header buttons
    public function getHeader($arr)
    {
        $output = "";
        foreach ($arr as $key => $data) {
            $output .= "<button class='btn " . ($key ? "btn-danger" : "btn-success") . " m-2 btn-menu' id='$data'>$data</button>";
        }
        return $output;
    }

    // return the body of perticular menu
    public function getView($title, $arr)
    {
        $output = '
            <h4 class="text-center mb-4">' . $title . '</h4>
            <div class="mb-3 input-group">
                <span class="input-group-text ms-1">From</span>
                <select class="form-select shadow-none border" name="from" id="from">
                    <option value="" disabled selected> - Select - </option>';

        foreach ($arr as $data) {
            $output .= "<option value='$data'>$data</option>";
        }

        $output .= '
                </select>
                <span class="input-group-text ms-1" id="swap"><i class="bi bi-code"></i></span>
                <span class="input-group-text ms-1">To</span>
                <select class="form-select shadow-none border" name="to" id="to">
                    <option value="" disabled selected> - Select - </option>';

        foreach ($arr as $data) {
            $output .= "<option value='$data'>$data</option>";
        }

        $output .= '</select>
                <div class="my-3 input-group">
                    <span class="input-group-text ms-1">Value</span>
                    <input type="text" class="form-control shadow-none border" name="value" id="value" ' . ($title !== "Temperature" ? 'min="0"' : '') . '>
                    <span class="input-group-text ms-1">Result</span>
                    <input type="text" class="form-control shadow-none border bg-white" name="result" id="result" readonly>
                </div>
            </div>';

        return $output;
    }
}
