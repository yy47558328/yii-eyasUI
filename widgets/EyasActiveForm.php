<?php

Yii::import('eyasui.widgets.input.EyasInput');
class EyasActiveForm extends CActiveForm
{

    
     /**
      * 表单类型.
      */
     const TYPE_SIMPLE = 'simple';



     /**
      * 表单类型对应类库.
      */
     const INPUT_SIMPLE = 'eyasui.widgets.input.Simple';


    /**
     * 开启Ajax验证.
     * @var boolean
     */
	public $enableAjaxValidation = true;

    /**
     * 开启客户端验证.
     * @var boolean
     */
	public $enableClientValidation = true;


    /**
     * Form表单默认类型
     * @var [type]
     */
    public $type = self::TYPE_SIMPLE;




    /**
     * HTML属性.
     * @var array
     */
    public $htmlOptions = array();








    public function init()
    {



         //设置表单类名.
         if(isset($this->htmlOptions['class']))
            
             $this->htmlOptions['class'] .= ' form-' . $this->type;
         
         else

             $this->htmlOptions['class'] = 'form-' . $this->type;


         parent::init();

    }

    /**
     * text类型input表单.
     * @param  [type] $model       [description]
     * @param  [type] $attribute   [description]
     * @param  array  $htmlOptions [description]
     * @return [type]              [description]
     */
    public function inputText($model, $attribute, $htmlOptions = array())
    {
        return $this->createInput(EyasInput::TYPE_TEXT, $model, $attribute, null, $htmlOptions);
    }


    /**
     * 根据给定input表单类型创建相应HTML标签.
     * @param  [type] $type        [description]
     * @param  [type] $model       [description]
     * @param  [type] $attribute   [description]
     * @param  [type] $data        [description]
     * @param  array  $htmlOptions [description]
     * @return [type]              [description]
     */
    public function createInput($type, $model, $attribute, $data = null, $htmlOptions = array())
    {
         ob_start();
         $this->getOwner()->widget($this->getInputClass(), array(
            'form'=>$this,
            'type'=>$type,
            'model'=>$model,
            'attribute'=>$attribute,
            'data'=>$data,
            'htmlOptions'=>$htmlOptions,
        ));
        return ob_get_clean();
    }

    /**
     * 获取相应类型的input类库索引.
     * @return [type] [description]
     */
    public function getInputClass()
    {

        switch($this->type)
        {
            default:
              return self::INPUT_SIMPLE;
        }

    }



}