<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of connexio
 *
 * @author jordi
 */
class connexio  extends mysqli {
	public function __construct() {
		parent::__construct("localhost","escoles20","q1w2e3r4","escoles20");

		if (mysqli_connect_error()) {
			die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
		}
	}
}
