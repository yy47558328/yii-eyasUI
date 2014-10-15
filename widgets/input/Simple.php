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

    
	protected function hint()
	{
        if (isset($this->hintText))
		{
			$htmlOptions = $this->hintOptions;

			if (isset($htmlOptions['class']))
				$htmlOptions['class'] .= ' help-block';
			else
				$htmlOptions['class'] = 'help-block';

			return CHtml::tag('p', $htmlOptions, $this->hintText);
		}
		else
			return '';
	}



    
    protected function textField()
    {

    	echo $this->label();
		echo '<div class="controls">';
		echo $this->form->textField($this->model, $this->attribute, $this->htmlOptions);
		echo $this->error();
		echo '</div>';

    }

}