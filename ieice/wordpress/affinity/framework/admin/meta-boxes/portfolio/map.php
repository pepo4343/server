<?php

if (!function_exists('affinity_mikado_portfolio_meta_box_map')) {
	function affinity_mikado_portfolio_meta_box_map() {

		$mkd_pages = array();
		$pages = get_pages();
		global $affinity_Framework;

		foreach($pages as $page) {
			$mkd_pages[$page->ID] = $page->post_title;
		}

		//Portfolio Images

		$mkdPortfolioImages = new AffinityMikadoMetaBox("portfolio-item", esc_html__('Portfolio Images (multiple upload)','affinity'), '', '', 'portfolio_images');
		$affinity_Framework->mkdMetaBoxes->addMetaBox("portfolio_images",$mkdPortfolioImages);

		$mkd_portfolio_image_gallery = new AffinityMikadoMultipleImages("mkd_portfolio-image-gallery", esc_html__('Portfolio Images','affinity'), esc_html('Choose your portfolio images','affinity'));
		$mkdPortfolioImages->addChild("mkd_portfolio-image-gallery",$mkd_portfolio_image_gallery);

		//Portfolio Images/Videos 2

		$mkdPortfolioImagesVideos2 = new AffinityMikadoMetaBox("portfolio-item", esc_html__('Portfolio Images/Videos (single upload)','affinity'));
		$affinity_Framework->mkdMetaBoxes->addMetaBox("portfolio_images_videos2",$mkdPortfolioImagesVideos2);

		$mkd_portfolio_images_videos2 = new AffinityMikadoImagesVideosFramework(esc_html__('Portfolio Images/Videos 2', 'affinity'),esc_html__('ThisIsDescription', 'affinity'));
		$mkdPortfolioImagesVideos2->addChild("mkd_portfolio_images_videos2",$mkd_portfolio_images_videos2);

		//Portfolio Additional Sidebar Items

		$mkdAdditionalSidebarItems = new AffinityMikadoMetaBox("portfolio-item", esc_html__('Additional Portfolio Sidebar Items' , 'affinity'));
		$affinity_Framework->mkdMetaBoxes->addMetaBox("portfolio_properties",$mkdAdditionalSidebarItems);

		$mkd_portfolio_properties = new AffinityMikadoOptionsFramework(esc_html__('Portfolio Properties','affinity'),esc_html__('ThisIsDescription','affinity'));
		$mkdAdditionalSidebarItems->addChild("mkd_portfolio_properties",$mkd_portfolio_properties);

	}
	add_action('affinity_mikado_meta_boxes_map', 'affinity_mikado_portfolio_meta_box_map');
}