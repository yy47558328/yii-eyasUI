<?php
class Simple extends EyasInput
{

	public function run()
	{
        echo CHtml::openTag('div', array('class'=>'control-group'));
		parent::run();
		echo '</div>';
	}


    /**
     * 表单标签.
     * @return [type] [description]
     */
	protected function label()
	{

		if (isset($this->labelOptions['class']))
			$this->labelOptions['class'] .= ' control-label';
		else
			$this->labelOptions['class'] = 'control-label';

		return parent::label();
	}

    
	



    
    protected function textField()
    {

    	echo $this->label();
		echo '<div class="controls">';
		$this->htmlOptions['class'] = 'form-control';
		echo $this->form->textField($this->model, $this->attribute, $this->htmlOptions);
		echo $this->error().$this->hint();
		echo '</div>';

    }

}