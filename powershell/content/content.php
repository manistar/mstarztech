<?php
class content
{
    private array $data;
    private array $input_data;
    private String | int $key;
    private array $accepted_type = ["input", "textarea", "select"];
    private String $placeholder = "---placeholderforinput---";
    // Example code for create_form
    // $users_form = [
    //     "full_name"=>[
    //     "title"=>"Enter full name",
    //     "value"=>"",
    //     "id"=>"my_full_name_id",
    //     "class"=>"add this class",
    //     "placeholder"=>"Enter your full name", 
    //     "description"=>"Enter both first name and last name", 
    //     "is_required"=>true, 
    //     "input_type"=>"text", 
    //     "type"=>"input",
    // ],
    //     "gender"=>["placeholder"=>"Select your gender", "is_required"=>true, "input_type"=>"select", "options"=>["Male"=>"Male", "Female"=>"Female"], "type"=>"input"],
    //     "tell_us_more"=>["placeholder"=>"Tell us more about your self", "is_required"=>false, "type"=>"textarea",],
    //     "input_data"=>["full_name"=>"seriki gbenga"],
    // ];
    function create_form($datas)
    {
        if (!is_array($datas)) {
            return null;
        }
        $main_code = "";
        foreach ($datas as $key => $data) {
            if (!is_array($data)) {
                continue ;
            }
            if ($key == "input_data") {
                $this->input_data = $data;
                continue;
            }
            $this->data = $data;
            $this->key = $key;
            $this->data['star'] = "";
            $this->data["value"] = $this->get_value($datas, $key);
            if(!isset($this->data['is_required']) || $this->data['is_required'] == true) { $this->data['is_required'] = true; $this->data['star'] = "*";}
            if(!isset($this->data['type'])) { $this->data['type'] = "input";}
            if(!isset($this->data['title'])) { $this->data['title'] = ucwords(str_replace("_", " ", $key));}
            if(!isset($this->data['id'])) { $this->data['id'] = $this->key;}
            if(!isset($this->data['class'])) { $this->data['class'] = $this->key;}
            if(!isset($this->data['placeholder'])) { $this->data['placeholder'] = "Enter your ".ucwords(str_replace("_", " ", $key));}
            if($this->data['type'] == "input" && !isset($this->data['input_type'])){ $this->data['input_type'] = "text"; }
            if(!in_array($this->data['type'], $this->accepted_type)) {continue;}
            $type = $this->data['type'];
            if($this->data['type'] == "input" && isset($this->data['input_type']) && $this->data['input_type'] == "hidden"){
                $main_code .=  $this->$type();
                continue;
            }
            $main_code .= str_replace($this->placeholder, $this->$type(), $this->get_header());
        }
        return $main_code;
    }

    function  get_header ()
    {
        $info =  "<div class='mb-3 form-group col-6'>
        <label>".ucwords($this->data['title'])." <span class='text-danger'>".$this->data['star']."</span></label>
        <div class='controls'>".$this->placeholder;
        if (isset($this->data['description'])) {
            $info .= "<div class='form-control-feedback ".$this->data['class']."'>
            <div class='help-block'></div>
            <small>".$this->data['description']."</small>
          </div>";
        }

        $info .= "
        </div>
      </div>";
      return $info;
    }

    function input()
    {
        $required = "";
        if($this->data['is_required']){$required = "required";}
        $info = "<input name='".$this->key."' value='".$this->data['value']."' id='".$this->data['id']."' type='".$this->data['input_type']."' class='form-control ".$this->data['class']."' placeholder='".$this->data['placeholder']."'";
        if(isset(Regex[$this->key]['value'])){
            $info .= "data-validation-required-message='".Regex[$this->key]['error_message']."' aria-invalid='false'";
        }
        $info .= " $required/>";
        return $info;
    }

    function get_value($datas, $key) {
        if(isset($_POST[$key])){return htmlspecialchars($_POST[$key]);}
        if(isset($datas['input_data'][$key])){return $datas['input_data'][$key];
        }
        return "";
    }
    function textarea() {
        return "<textarea class='form-control' placeholder='".$this->data['placeholder']."'  name='".$this->key."'>".$this->data['value']."</textarea>";
    }
    function select() {
        if(isset($this->data['options'])){
            $info = "<select name='".$this->key."' class='form-control ".$this->data['class']."' id='".$this->data['class']."'>";
            if($this->data['placeholder']) {
                $info .= "<option value=''>".$this->data['placeholder']."</option>";
            }
            foreach ($this->data['options'] as $key => $value) {
                $selected = "";
                if($value == $this->data['value']){$selected = "selected";}
                $info .= "<option value='$key' $selected>$value</option>";
            }
            $info .= "</select>";
            return $info;
        }
        
        return null;
    }
    
}
