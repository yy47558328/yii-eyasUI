<?php
class Button extends CWidget
{
    
    /**
     * button color styles
     */
    const STYLE_PRIMARY = 'primary';
    const STYLE_SUCCESS = 'success';
    const STYLE_INFO = 'info';
    const STYLE_WARNING = 'warning';
    const STYLE_ERROR = 'error';


    /**
     * button types
     */
    const TYPE_BUTTON = 'button';
    const TYPE_SUBMIT = 'submit';
    const TYPE_SUBMITLINK = 'submitLink';
    const TYPE_RESET = 'reset';
    const TYPE_AJAXLINK = 'ajaxLink';
    const TYPE_AJAXBUTTON = 'ajaxButton';
    const TYPE_AJAXSUBMIT = 'ajaxSubmit';
    const TYPE_INPUTBUTTON = 'inputButton';
    const TYPE_INPUTSUBMIT = 'inputSubmit';



     /**
      * button default style
      * @var [type]
      */
     public $style;



     public $disabled;


     public $label;


     public $type = self::TYPE_SUBMIT;


     public $htmlOptions = array();


     public $ajaxOptions = array();


     public $url;



	public function init()
	{


        $class =  array('btn');
        $styles = array(SELF::STYLE_PRIMARY, SELF::STYLE_SUCCESS, SELF::STYLE_INFO, SELF::STYLE_WARNING, SELF::STYLE_ERROR);


        //设置css风格.
        if(isset($this->style) && in_array($this->style, $styles))
        	$class[] = 'btn-'.$this->style;

        //设置按钮是否启用.
        if(isset($this->disabled))
        	$this->htmlOptions['disabled'] = 'disabled';


        if(!empty($class))
        {
        	$class = implode(' ', $class);
        	$this->htmlOptions['class'] = $class;
        }


	}


	public function run()
	{
		echo $this->create();
	}



	public function create()
	{
         switch($this->type)
         {
             case self::TYPE_BUTTON:
               return CHtml::htmlButton($this->label, $this->htmlOptions);
               break;
             case self::TYPE_SUBMITLINK:
               return CHtml::linkButton($this->label, $this->htmlOptions);
               break;
             case self::TYPE_RESET:
               $this->htmlOptions['type'] = 'reset';
			   return CHtml::htmlButton($this->label, $this->htmlOptions);
               break;
             case self::TYPE_AJAXLINK:
               return CHtml::ajaxLink($this->label, $this->url, $this->ajaxOptions, $this->htmlOptions);
               break;
             case self::TYPE_AJAXBUTTON:
               $this->ajaxOptions['url'] = $this->url;
			   $this->htmlOptions['ajax'] = $this->ajaxOptions;
			   return CHtml::htmlButton($this->label, $this->htmlOptions);
               break;
             case self::TYPE_AJAXSUBMIT:
                $this->ajaxOptions['type'] = isset($this->ajaxOptions['type']) ? $this->ajaxOptions['type'] : 'POST';
				$this->ajaxOptions['url'] = $this->url;
				$this->htmlOptions['type'] = 'submit';
				$this->htmlOptions['ajax'] = $this->ajaxOptions;
				return CHtml::htmlButton($this->label, $this->htmlOptions);
               break;
             case self::TYPE_INPUTBUTTON:
               return CHtml::button($this->label, $this->htmlOptions);
               break;
             case self::TYPE_INPUTSUBMIT:
               $this->htmlOptions['type'] = 'submit';
			   return CHtml::button($this->label, $this->htmlOptions);
               break;
             default:
               $this->htmlOptions['type'] = 'submit';
               return CHtml::htmlButton($this->label, $this->htmlOptions);

         }
	}
}