<?php

class BaseController extends Controller {


	public $pid;

    public function __construct(){

        if (Input::has('pid')) {
            $this->pid = Input::get('pid');
        }
    }

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}


}
