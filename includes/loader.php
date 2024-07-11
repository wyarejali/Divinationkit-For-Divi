<?php

if ( ! class_exists( 'ET_Builder_Element' ) ) {
	return;
}


require_once DINA_DIVINATIONKIT_DIR . 'includes/modules/Core/DiviNationKit-core.php';
require_once DINA_DIVINATIONKIT_DIR . 'includes/modules/Core/type/PostBased.php';
// require_once DINA_DIVINATIONKIT_DIR . 'includes/modules/AdvancedDivider/AdvancedDivider.php';
// require_once DINA_DIVINATIONKIT_DIR . 'includes/modules/FlipCard/FlipCard.php';
// require_once DINA_DIVINATIONKIT_DIR . 'includes/modules/IconBox/IconBox.php';
// require_once DINA_DIVINATIONKIT_DIR . 'includes/modules/IconList/IconList.php';
// require_once DINA_DIVINATIONKIT_DIR . 'includes/modules/IconListChild/IconListChild.php';
// require_once DINA_DIVINATIONKIT_DIR . 'includes/modules/LogoSlider/LogoSlider.php';
// require_once DINA_DIVINATIONKIT_DIR . 'includes/modules/LogoSliderChild/LogoSliderChild.php';
// require_once DINA_DIVINATIONKIT_DIR . 'includes/modules/PriceList/PriceList.php';
// require_once DINA_DIVINATIONKIT_DIR . 'includes/modules/PriceListChild/PriceListChild.php';
// require_once DINA_DIVINATIONKIT_DIR . 'includes/modules/Review/Review.php';
// require_once DINA_DIVINATIONKIT_DIR . 'includes/modules/Rating/Rating.php';

$module_files = glob( __DIR__ . '/modules/*/*.php' );

// Load custom Divi Builder modules
foreach ( (array) $module_files as $module_file ) {
	if ( $module_file && preg_match( "/\/modules\/\b([^\/]+)\/\\1\.php$/", $module_file ) ) {
		require_once $module_file;
	}
}
