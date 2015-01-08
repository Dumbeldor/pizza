<?php
namespace Glize;

class Page extends ApplicationComponent
{
	protected $contentFile,
			  $vars = [];

	public function addVar($var, $value)
	{
		if(!is_string($var) || is_numeric($var) || empty($var))
		{
			throw new \InvalidArgumentException('Le nom de la variable doit être une chaine de caractère');
		}
		$this->vars[$var] = $value;
	}

	public function getGeneratedPage($layout)
	{
		if(!file_exists($this->contentFile))
		{
			throw new \InvalidArgumentException('La vue spécifiée n\'existe pas');
		}

		extract($this->vars);

		ob_start();
			require $this->contentFile;
		$content = ob_get_clean();

		ob_start();
			require $layout;
		ob_get_clean();

	}

	public function setContentFile($contentFile)
	{
		if(!is_string($contentFile) || empty($contentFile))
		{
			throw new \InvalidArgumentException('La vue spécifiée est invalide');
		}
		$this->contentFile = $contentFile;
	}
}