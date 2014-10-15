<?php
/**
 * EyasUI core component
 */
class EyasUI extends CApplicationComponent
{

	public $forceCopyAssets = true;

	protected $_assetsUrl;

	/**
	 * 注册EyasUI所需文件.
	 * @return [type] [description]
	 */
	public function register()
	{
        $this->registerCss();
	}


    /**
     * 注册EyasUI所需CSS库.
     * @return [type] [description]
     */
	public function registerCss()
	{
	   $filename = YII_DEBUG ? 'eyas-ui.css' : 'eyas-ui.min.css';
       $css = Yii::app()->getClientScript();
       Yii::app()->clientScript->registerCssFile($this->getAssetsUrl().'/css/'.$filename);
	}

    /**
     * 注册EyasUI所需Javascript库.
     * @return [type] [description]
     */
	public function registerScript()
	{

	}


	protected function getAssetsUrl()
	{
		if (isset($this->_assetsUrl))
			return $this->_assetsUrl;
		else
		{
			$assetsPath = Yii::getPathOfAlias('eyasui.assets');
			$assetsUrl = Yii::app()->assetManager->publish($assetsPath, true, -1, $this->forceCopyAssets);
			return $this->_assetsUrl = $assetsUrl;
		}
	}
}