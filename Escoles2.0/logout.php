<?php
/**
 * @author Grup1
 * @version 0.1
 */
	session_start();
	session_destroy();
	header('Location: index.php');
