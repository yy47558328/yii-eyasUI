<?php
/**
 * input abstract class
 */
abstract class EyasInput extends CInputWidget
{
     /**
      * input表单类型.
      */
     const TYPE_TEXT = 'text';


     /**
      * 表单对象.
      * @var CActiveForm
      */
     public $form;

     /**
      * 表单类型.
      * @var String
      */
     public $type;


     /**
      * 表单数据.
      * @var [type]
      */
     public $data;


/*****************************************************************
 *  label
 * **************************************************************/
    
     public $label;

     public $labelOptions;


/*****************************************************************
 *  error
 * **************************************************************/

     public $errorOptions;






     

     public function init()
     {
        $this->processHtmlOptions();
     }


     /**
     * 处理HTML属性.
     * @return [type] [description]
     */
	protected function processHtmlOptions()
	{

		//label
        if (isset($this->htmlOptions['label']))
		{
			$this->label = $this->htmlOptions['label'];
			unset($this->htmlOptions['label']);
		}


        //error
		if (isset($this->htmlOptions['errorOptions']))
		{
			$this->errorOptions = $this->htmlOptions['errorOptions'];
			unset($this->htmlOptions['errorOptions']);
		}


		
	}


     public function run()
     {

         switch($this->type)
         {

         	 case self::TYPE_TEXT:
         	   $this->textField();
         	   break;

         	 default:
         	    throw new CException(__CLASS__.': Failed to run widget! Type is invalid.');

         }
     }

     /**
      * input表单标签.
      * @return [String] html label tag text;
      */
     protected function label()
	 {
	 	 if($this->label !== false && $this->hasModel())
	 	 
             return $this->form->labelEx($this->model, $this->attribute, $this->labelOptions);

	 	 else if($this->label !== null)

	 	     return $this->label;

	 	 else

	 	 	return '';
	 }



	 /**
	 * Returns the error text for the input.
	 * @return string the error text
	 */
	protected function error()
	{
		return $this->form->error($this->model, $this->attribute, $this->errorOptions);
	}



     /**
      * text类型的input表单生成函数
      * @return [type] [description]
      */
     abstract protected function textField();

}