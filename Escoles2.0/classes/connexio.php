<?php

/**
 * @author Grup1
 * @version 0.1
 */
class connexio  extends mysqli {
	public function __construct() {
		parent::__construct("localhost","escoles20","q1w2e3r4","escoles20");

		if (mysqli_connect_error()) {
			die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
		}
	}
}
