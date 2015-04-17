<?php namespace HireMe\Components;

use Lang;
use Session;
use Form;
use File;

class fieldBuilder
{

	protected $defaultClass = [
		'default' => 'form-control',
		'checkbox' => ''
	];

	public function getDefaultClass($type)
	{
		if(isset($this->defaultClass[$type]))
		{
			return $this->defaultClass[$type];
		}

		return $this->defaultClass['default'];
	}

	public function buildCssClasses($type, &$attributes)
	{
		$defaultClasses = $this->getDefaultClass($type);

		if(isset($attributes['class']))
		{
			$attributes['class'] .= ' ' . $defaultClasses;
		}
		else
		{
			$attributes['class'] = $defaultClasses;
		}
	}

	public function buildLabel($name)
	{
		if(Lang::has('validation.attributes.'.$name))
		{
			$label = Lang::get('validation.attributes.'.$name);
		}
		else
		{
			$label = str_replace('_', ' ', $name);
		}

		return ucfirst($label);
	}

	public function buildControl($type, $name, $value = null, $attributes = array(), $options = array())
	{
		switch($type)
		{
			case 'select':
				$options = array('' => 'Seleccione...') + $options;
				return Form::select($name, $options, $value, $attributes);

			case 'password':
				return Form::password($name, $attributes);

			case 'checkbox':
				return Form::checkbox($name);

			case 'textarea':
				return Form::textarea($name, $value, $attributes);

			default:
				return Form::input($type, $name, $value, $attributes);	
		}
	}

	public function buildError($name)
	{
		$error = null;
		if(Session::has('errors'))
		{
			$errors = Session::get('errors');

			if($errors->has($name))
			{
				$error = $errors->first($name);
			}
		}

		return $error;
	}

	public function buildTemplate($type)
	{
		if(File::exists('resources\views\fields'. $type .'.blade.php'))
		{
			return 'fields/'.$type;
		}

		return 'fields/default';
	}

	public function input($type, $name, $value = null, $attributes = array(), $options = array())
	{
		$this->buildCssClasses($type, $attributes);
		$label = $this->buildLabel($name);
		$control = $this->buildControl($type, $name, $value, $attributes, $options);
		$error = $this->buildError($name);
		$template = $this->buildTemplate($type);

		return view($template, compact('name', 'label', 'control', 'error'));
	}

	public function password($name, $attributes = array())
	{
		return $this->input('password', $name, null, $attributes);
	}

	public function select($name, $options, $value = null, $attributes = array())
	{
		return $this->input('select', $name, $value, $attributes, $options);
	}

	public function __call($method, $params)
	{
		array_unshift($params, $method);
		return call_user_func_array([$this, 'input'], $params);
	}
}

