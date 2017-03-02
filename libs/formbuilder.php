<?php

class formbuilder{

    private $html;
    private $columns = 1;
    private $columnWidth = 12;

    public function __construct($name = "", $columns = 1, $action = "", $method = "post", $enctype = false)
    {
        $token = uniqid();
        sessions::set('form-token', $token);

        $this -> columns = $columns;
        $this -> columnWidth = 12 / $columns;

        $this -> html = "<form id=\"form-$name\" action=\"$action\" method=\"$method\"";

        if($enctype) $this -> html .= " enctype=\"multipart/form-data\"";

        $this -> html .= ">";

        $this -> html .= "<input type=\"hidden\" name=\"token\" value=\"$token\">";

        $this -> html .= "<div class=\"$name\">";
    }

    /**
     * Fügt ein Input-Feld hinzu
     *
     * @param string $type
     * @param string $name
     * @param bool $label
     * @param array $attr
     * @return $this
     */
    public function addInput($type = "text", $name = "", $label = false, $attr = array())
    {
        $this -> html .= "<div class=\"columns-{$this->columns}\">";

        $this -> html .= "<div class=\"form-group\">";

        if($label) $this -> html .= "<label for=\"f-$name\"";

        if(isset($attr['checkbox'])){
            $this -> html .= " class='contol--checkbox'>$label";
        }

        if(!isset($attr['checkbox'])){
          $this -> html .= ">$label</label>";
        }

        $this -> html .= "<input type=\"$type\" name=\"f-$name\" id=\"f-$name\"";

        foreach($attr as $key => $val) {

            if($key == "class") continue;

            $this -> html .= " $key=\"$val\"";
        }

        $inputClass = (isset($attr['class'])) ? $attr['class'] : "";
        $this -> html .= " class=\"form-control $inputClass\"";

        $this -> html .= ">"; //endtag Input?

        if(isset($attr['checkbox'])){
          $this -> html.= "<div class = 'control__indicator'></div>";
        }

        if(isset($attr['checkbox'])){
          $this -> html .= "</label>";
        }
        $this -> html .= "</div>"; // endtag für form-control
        $this -> html .= "</div>"; // endtag für col-sm

        return $this;
    }

    public function addSelect($name = "", $label = false, $opt = array(), $selected = null, $attr = array())
    {
        $this -> html .= "<div class=\"col-sm-{$this->columnWidth}\">";

        $this -> html .= "<div class=\"form-group\">";

        if($label) $this -> html .= "<label for=\"f-$name\">$label</label>";

        $this -> html .= "<select name=\"f-$name\" id=\"f-$name\"";

        foreach($attr as $key => $val) {
            if($key == "class") continue;
            $this -> html .= " $key=\"$val\"";
        }

        $inputClass = (isset($attr['class'])) ? $attr['class'] : "";
        $this -> html .= " class=\"form-control $inputClass\"";

        $this -> html .= ">";

        foreach($opt as $key => $val) {
            if($selected == $key) {
                $this -> html .= "<option value=\"$key\" selected>$val</option>";
            }else{
                $this -> html .= "<option value=\"$key\">$val</option>";
            }
        }

        $this -> html .= "</select></div>";
        $this -> html .= "</div>";

        return $this;
    }

    public function addTextarea($name = "", $label = false, $value = "", $attr = array())
    {
        $this -> html .= "<div class=\"col-sm-12\">";

        $this -> html .= "<div class=\"form-group\">";

        if($label) $this -> html .= "<label for=\"f-$name\">$label</label>";

        $this -> html .= "<textarea name=\"f-$name\" id=\"f-$name\"";

        foreach($attr as $key => $val) {
            if($key == "class") continue;
            $this -> html .= " $key=\"$val\"";
        }

        $inputClass = (isset($attr['class'])) ? $attr['class'] : "";
        $this -> html .= " class=\"form-control $inputClass\"";

        $this -> html .= ">$value</textarea>";

        $this -> html .= "</div>";
        $this -> html .= "</div>";

        return $this;
    }

    public function addButton($name = "", $value = "", $attr = array())
    {
        $this -> html .= "<div class=\"col-sm-12\">";

        $this -> html .= "<button name=\"f-$name\" id=\"f-$name\"";

        foreach($attr as $key => $val) {
            if($key == "class") continue;
            $this -> html .= " $key=\"$val\"";
        }

        $inputClass = (isset($attr['class'])) ? $attr['class'] : "";
        $this -> html .= " class=\"btn $inputClass\"";

        $this -> html .= ">$value</button>";
        $this -> html .= "</div>";

        return $this;
    }

    /**
     * Returns the complete HTML Markup for the form.
     *
     * @return string
     */
    public function output()
    {
        $this -> html .= "</div>";
        $this -> html .= "</form>";
        return $this -> html;
    }
}
