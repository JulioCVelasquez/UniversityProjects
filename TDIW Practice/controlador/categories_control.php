<?php

	require_once __DIR__.'/../model/categories_model.php';

	$result = getCategories();

	include __DIR__.'/../views/categories_view.php';

?>