<?php
/**
 * Widgets Manager class for Mega Elements
 * 
 * @package Mega_Elements_Addons
 */
namespace MegaElementsAddonsForElementor;

use Elementor\Element_Base;

defined( 'ABSPATH' ) || die();

/**
 * Widget Manager main class
 */
class Widgets_Manager {

    // Save key for inactive widgets.
	const WIDGETS_DB_KEY = 'megaelementsaddons_inactive_widgets';

	/**
	 * Initialize class
	 */
	public static function init() {
		add_action( 'elementor/widgets/widgets_registered', [ __CLASS__, 'register' ] );
	}

    /**
     * Get inactive widgets.
     *
     * @return void
     */
	public static function get_inactive_widgets() {
		return get_option( self::WIDGETS_DB_KEY, [] );
	}

    /**
     * Save inactive widgets.
     *
     * @param array $widgets
     * @return void
     */
	public static function save_inactive_widgets( $widgets = [] ) {
		update_option( self::WIDGETS_DB_KEY, $widgets );
	}

	/**
	 * Get the free widgets map
	 *
	 * @return array
	 */
	public static function get_local_widgets_map() {
		// All the widgets are listed below with respective map

		return [
			'meafe-about' => [
                'name'      => __('Featured Page', 'mega-elements-addons-for-elementor'),
                'classname' => 'MEAFE_About',
                'slug'      => 'about',
                'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="13.347" viewBox="0 0 14 13.347"><path d="M37.589,10.688a.844.844,0,0,1,.275.825l-.8,3.328a.833.833,0,0,0,1.238.908l2.943-1.788a.844.844,0,0,1,.88,0l2.943,1.788a.829.829,0,0,0,1.238-.908l-.8-3.328a.79.79,0,0,1,.275-.825L48.4,8.46A.822.822,0,0,0,47.932,7l-3.411-.275a.878.878,0,0,1-.715-.523L42.458,3.041a.833.833,0,0,0-1.54,0L39.6,6.2a.809.809,0,0,1-.715.523L35.471,7A.824.824,0,0,0,35,8.46Z" transform="translate(-34.702 -2.525)" fill="#14132b" opacity="0.8"></path></svg>'
            ],
            'meafe-accordion' => [
                'name'      => __('Accordion', 'mega-elements-addons-for-elementor'),
                'classname' => 'MEAFE_Accordion',
                'slug'      => 'accordion',
                'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" width="15.85" height="10.233" viewBox="0 0 15.85 10.233"><path d="M392.32-31.309l2.225-2.2,5.755,5.6,5.587-5.641,2.283,2.239-7.922,7.994Z" transform="translate(-392.32 33.544)" fill="#14132b" opacity="0.8"></path></svg>'
            ],
            'meafe-blockquote' => [
                'name'      => __('Blockquote', 'mega-elements-addons-for-elementor'),
                'classname' => 'MEAFE_Blockquote',
                'slug'      => 'blockquote',
                'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" width="20.031" height="14.92" viewBox="0 0 20.031 14.92"><g transform="translate(0 -12.758)" opacity="0.4"><path d="M20.031,27.678H11.455V19.1c0-2.216.255-6.344,8.576-6.344v1.821c-4,0-4.5,2.537-4.28,4.523h4.28ZM8.576,19.1H4.3c-.221-1.986.28-4.523,4.28-4.523V12.758C.256,12.758,0,16.886,0,19.1v8.576H8.576Z" fill="#14132b"></path></g></svg>'
            ],
            'meafe-blog' => [
                'name'      => __('Blog', 'mega-elements-addons-for-elementor'),
                'classname' => 'MEAFE_Blog',
                'slug'      => 'blog',
                'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><g transform="translate(-2239 -695)" opacity="0.4"><rect width="9" height="3" transform="translate(2250 695)" fill="#14132b"></rect><rect width="9" height="3" transform="translate(2250 701)" fill="#14132b"></rect><rect width="20" height="3" transform="translate(2239 712)" fill="#14132b"></rect><rect width="20" height="3" transform="translate(2239 706)" fill="#14132b"></rect><path d="M22,30.513h8.513V22H22Zm2.838-5.675h2.838v2.838H24.838Z" transform="translate(2217 673)" fill="#14132b"></path></g></svg>'
            ],
            'meafe-bten' => [
                'name'      => __('Email Newsletter', 'mega-elements-addons-for-elementor'),
                'classname' => 'MEAFE_BTEN',
                'slug'      => 'bten',
                'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" width="19.853" height="14.767" viewBox="0 0 19.853 14.767"><g transform="translate(-24.658 -31.1)" opacity="0.4"><path d="M34.153,39.286a.7.7,0,0,0,.862,0l9.2-6.894a.715.715,0,0,0-.431-1.293H25.379a.717.717,0,0,0-.431,1.293Z" transform="translate(0 0)" fill="#14132b"></path><path d="M24.8,38.7V49.476a.619.619,0,0,0,.627.627H43.914a.619.619,0,0,0,.627-.627V38.7a.634.634,0,0,0-1.018-.509l-8.46,6.385a.712.712,0,0,1-.783,0l-8.46-6.385A.64.64,0,0,0,24.8,38.7Z" transform="translate(-0.087 -4.236)" fill="#14132b"></path></g></svg>'
            ],
            'meafe-button' => [
                'name'      => __('Button', 'mega-elements-addons-for-elementor'),
                'classname' => 'MEAFE_Button',
                'slug'      => 'button',
                'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" width="29" height="32.477" viewBox="0 0 29 32.477"><g transform="translate(-877 -738)" opacity="0.4"><g transform="translate(877 738)" fill="#fff" stroke="#14132b" stroke-width="2"><rect width="27" height="15" rx="3" stroke="none"></rect><rect x="1" y="1" width="25" height="13" rx="2" fill="none"></rect></g><path d="M412.916-221.579l1.074,2.526c.387.909.775,1.817,1.16,2.727a.9.9,0,0,1-.552,1.348c-.571.244-1.142.489-1.714.73a.891.891,0,0,1-1.293-.518q-1.049-2.458-2.094-4.919c-.047-.111-.1-.22-.194-.442a2.414,2.414,0,0,1-.219.33c-.866.893-1.738,1.779-2.6,2.672a.689.689,0,0,1-.785.261c-.326-.129-.373-.421-.372-.735q.006-4.25,0-8.5,0-3.348,0-6.7a2.2,2.2,0,0,1,.014-.366.586.586,0,0,1,.929-.409,1.892,1.892,0,0,1,.278.238q2.793,2.7,5.584,5.4l5.25,5.076c.037.035.072.072.11.107a.655.655,0,0,1,.246.76.653.653,0,0,1-.7.38c-1.264,0-2.528.01-3.792.016C413.151-221.6,413.053-221.587,412.916-221.579Zm1.405,5.7c-.052-.129-.091-.232-.134-.334q-1.1-2.586-2.2-5.172c-.287-.677.009-1.136.741-1.142,1.09-.01,2.181-.009,3.271-.013.1,0,.193-.009.357-.016l-10.089-9.753v14.047c.111-.105.184-.171.253-.242q1.154-1.181,2.306-2.363a.679.679,0,0,1,.82-.229,1.182,1.182,0,0,1,.485.546c.742,1.7,1.46,3.406,2.186,5.111.049.116.107.229.163.348Z" transform="translate(488.214 984.619)" fill="#14132b"></path><path d="M412.9-328.662c0,.509,0,1.017,0,1.525,0,.356-.172.56-.459.566s-.473-.2-.474-.549q-.008-1.541,0-3.081c0-.357.18-.553.472-.549s.458.206.461.562C412.906-329.679,412.9-329.171,412.9-328.662Z" transform="translate(481.978 1075.75)" fill="#14132b"></path><path d="M455.509-298.289a2.1,2.1,0,0,1-.237.4q-1.1,1.12-2.222,2.224a.457.457,0,0,1-.7.033.468.468,0,0,1,.034-.682q1.115-1.129,2.243-2.245a.424.424,0,0,1,.552-.108A1.806,1.806,0,0,1,455.509-298.289Z" transform="translate(444.187 1045.69)" fill="#14132b"></path><path d="M337.509-180.236a3.319,3.319,0,0,1-.3.434c-.546.547-1.1,1.082-1.653,1.626-.18.178-.34.378-.523.554a.458.458,0,0,1-.7.016.474.474,0,0,1,.049-.683c.738-.745,1.482-1.483,2.223-2.225a.433.433,0,0,1,.549-.128A1.918,1.918,0,0,1,337.509-180.236Z" transform="translate(554.984 934.875)" fill="#14132b"></path><path d="M470.963-220.7c.509,0,1.017,0,1.526,0,.346,0,.557.186.551.471s-.213.452-.541.453q-1.556,0-3.112,0a.476.476,0,0,1-.535-.459.466.466,0,0,1,.525-.464C469.9-220.7,470.434-220.7,470.963-220.7Z" transform="translate(428.572 972.431)" fill="#14132b"></path><path d="M304.015-219.771c-.509,0-1.017,0-1.526,0-.344,0-.557-.189-.553-.472s.209-.451.539-.451q1.556,0,3.112,0c.328,0,.532.179.537.453s-.209.469-.553.471C305.053-219.768,304.534-219.771,304.015-219.771Z" transform="translate(585.277 972.429)" fill="#14132b"></path><path d="M337.542-295.814c-.119.148-.2.346-.329.385a.643.643,0,0,1-.52-.081c-.343-.284-.643-.621-.96-.937-.425-.424-.85-.847-1.273-1.274-.258-.26-.281-.545-.068-.746s.47-.167.723.085q1.081,1.077,2.155,2.161A2.75,2.75,0,0,1,337.542-295.814Z" transform="translate(554.942 1045.561)" fill="#14132b"></path></g></svg>'
            ],
            'meafe-category' => [
                'name'      => __('Category', 'mega-elements-addons-for-elementor'),
                'classname' => 'MEAFE_Category',
                'slug'      => 'category',
                'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" width="19.853" height="19.864" viewBox="0 0 19.853 19.864"><g transform="translate(-231 -835)" opacity="0.8"><path d="M76.079,330.821h4.836v4.85H76.079Z" transform="translate(154.522 505.451)" fill="#14132b"></path><path d="M132.089,335.731V330.9h4.838v4.827Z" transform="translate(105.903 505.379)" fill="#14132b"></path><path d="M188.24,335.705v-4.837h4.844v4.837Z" transform="translate(57.162 505.41)" fill="#14132b"></path><path d="M80.789,391.893H75.94v-4.839h4.849Z" transform="translate(154.643 456.639)" fill="#14132b"></path><path d="M137.079,387.121v4.822h-4.843v-4.822Z" transform="translate(105.776 456.58)" fill="#14132b"></path><path d="M188.148,391.967v-4.828h4.871v4.828Z" transform="translate(57.242 456.565)" fill="#14132b"></path><path d="M80.948,448.03H76.123v-4.865h4.825Z" transform="translate(154.484 407.931)" fill="#14132b"></path><path d="M137,448.063h-4.826v-4.851H137Z" transform="translate(105.832 407.891)" fill="#14132b"></path><path d="M188.159,448.089v-4.838h4.87v4.838Z" transform="translate(57.232 407.857)" fill="#14132b"></path></g></svg>'
            ],
            'meafe-cf7' => [
                'name'      => __('Contact Form 7', 'mega-elements-addons-for-elementor'),
                'classname' => 'MEAFE_CF7',
                'slug'      => 'cf7',
                'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" width="21.656" height="22.667" viewBox="0 0 21.656 22.667"><g transform="translate(-555.592 -834.092)"><path d="M76.079,330.821H95.726v4.85H76.079Z" transform="translate(480.003 505.451)" fill="none" stroke="#14132b" stroke-width="1.8" opacity="0.4"></path><path d="M95.606,399.311H75.94V387.054H95.606Z" transform="translate(480.142 457.639)" fill="none" stroke="#14132b" stroke-width="1.8" opacity="0.4"></path></g></svg>'
            ],
            'meafe-checklist' => [
                'name'      => __('Checklist', 'mega-elements-addons-for-elementor'),
                'classname' => 'MEAFE_Checklist',
                'slug'      => 'checklist',
                'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" width="17.498" height="20.998" viewBox="0 0 17.498 20.998"><path d="M31.224,972.368a.709.709,0,0,0-.459.262l-3.008,3.609-1.564-1.564a.7.7,0,1,0-.984,1l2.1,2.1a.729.729,0,0,0,1.028-.044l3.5-4.2a.7.7,0,0,0-.612-1.159Zm2.176,3.161a.7.7,0,1,0,0,1.4h8.4a.7.7,0,1,0,0-1.4Zm-2.176,4.539a.709.709,0,0,0-.459.262l-3.008,3.609-1.564-1.564a.7.7,0,1,0-.984,1l2.1,2.1a.729.729,0,0,0,1.028-.044l3.5-4.2a.7.7,0,0,0-.612-1.159Zm2.176,3.161a.7.7,0,0,0,0,1.4h8.4a.7.7,0,0,0,0-1.4Zm-2.176,4.539a.709.709,0,0,0-.459.262l-3.008,3.609-1.564-1.564a.7.7,0,1,0-.984,1l2.1,2.1a.729.729,0,0,0,1.028-.044l3.5-4.2a.7.7,0,0,0-.612-1.159Zm2.176,3.161a.7.7,0,0,0,0,1.4h8.4a.7.7,0,0,0,0-1.4Z" transform="translate(-25.002 -972.363)" fill="#14132b" opacity="0.4"/></svg>'
            ],
            'meafe-clients' => [
                'name'      => __('Clients Logo', 'mega-elements-addons-for-elementor'),
                'classname' => 'MEAFE_Clients',
                'slug'      => 'clients',
                'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24"><defs><clipPath id="a"><circle cx="12" cy="12" r="12" transform="translate(0 -0.439)" fill="#14132b"></circle></clipPath></defs><g transform="translate(-229 -936.561)" opacity="0.8"><g transform="translate(229 936.561)" fill="none" stroke="#14132b" stroke-width="1" opacity="0.3"><circle cx="12" cy="12" r="12" stroke="none"></circle><circle cx="12" cy="12" r="11.5" fill="none"></circle></g><g transform="translate(229 937)" clip-path="url(#a)"><g transform="translate(3.026 5.866)"><path d="M13.159,11.938a1.777,1.777,0,0,1-2.168-1.289,1.706,1.706,0,0,1,0-.879,1.76,1.76,0,0,1,1.263-1.289h.026a1.784,1.784,0,1,1,.879,3.457Z" transform="translate(-5.986 -8.426)" fill="#14132b"></path><path d="M23.233,17.039v1.434h-.024v5.769h-19V19.884l4.665-5.906,2.707,3.384L16.594,9.53Z" transform="translate(-4.21 -5.43)" fill="#14132b"></path></g></g></g></svg>'
            ],
            'meafe-countdown' => [
                'name'      => __('Countdown Timer', 'mega-elements-addons-for-elementor'),
                'classname' => 'MEAFE_Countdown',
                'slug'      => 'countdown',
                'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20"><defs><clipPath id="clip-path"><rect id="Rectangle_1442" data-name="Rectangle 1442" width="20" height="20" transform="translate(556 1037)" fill="#14132b"></rect></clipPath></defs><g id="Group_1461" data-name="Group 1461" transform="translate(-556 -936)"><rect id="Rectangle_1445" data-name="Rectangle 1445" width="20" height="20" transform="translate(556 936)" fill="#14132b" opacity="0.8"></rect><g id="Group_1462" data-name="Group 1462"><g id="Mask_Group_3" data-name="Mask Group 3" transform="translate(0 -101)" clip-path="url(#clip-path)"><g id="Rectangle_1440" data-name="Rectangle 1440" transform="translate(561 1051)" fill="none" stroke="#fff" stroke-width="3"><rect width="11" height="14" rx="5.5" stroke="none"></rect><rect x="1.5" y="1.5" width="8" height="11" rx="4" fill="none"></rect></g><g id="Rectangle_1441" data-name="Rectangle 1441" transform="translate(561 1036)" fill="none" stroke="#fff" stroke-width="3"><rect width="11" height="14" rx="5.5" stroke="none"></rect><rect x="1.5" y="1.5" width="8" height="11" rx="4" fill="none"></rect></g></g></g></g></svg>'
            ],
            'meafe-counter' => [
                'name'      => __('Counter', 'mega-elements-addons-for-elementor'),
                'classname' => 'MEAFE_Counter',
                'slug'      => 'counter',
                'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" width="25.044" height="28" viewBox="0 0 25.044 28"><g transform="translate(-879 -931)" opacity="0.4"><text transform="translate(879 955)" fill="#14132b" font-size="14" font-family="SegoeUI-Bold, Segoe UI" font-weight="700"><tspan x="0" y="0">1</tspan></text><text transform="translate(886 951)" fill="#14132b" font-size="14" font-family="SegoeUI-Bold, Segoe UI" font-weight="700"><tspan x="0" y="0">2</tspan></text><text transform="translate(895 946)" fill="#14132b" font-size="14" font-family="SegoeUI-Bold, Segoe UI" font-weight="700"><tspan x="0" y="0">3</tspan></text><path d="M356.561,12.892l1.486,1.447c.08.078.16.155.234.237a.853.853,0,0,1,0,1.2.832.832,0,0,1-1.2-.012c-.494-.477-.974-.969-1.461-1.455-.064-.063-.13-.124-.233-.221l-.551,1.19c-.038.083-.08.164-.112.249a.559.559,0,0,1-.582.436c-.312-.021-.437-.244-.517-.516-.341-1.153-.688-2.3-1.033-3.455q-.252-.842-.507-1.683a.577.577,0,0,1,.115-.646.6.6,0,0,1,.651-.084q2.551.777,5.106,1.54c.272.081.493.189.521.507s-.175.471-.43.586C357.58,12.425,357.114,12.639,356.561,12.892Z" transform="translate(657.263 692.794) rotate(45)" fill="#14132b"></path></g></svg>'
            ],
            'meafe-cta' => [
                'name'      => __('Call To Action', 'mega-elements-addons-for-elementor'),
                'classname' => 'MEAFE_Cta',
                'slug'      => 'cta',
                'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" width="29.068" height="28.92" viewBox="0 0 29.068 28.92"><g transform="translate(-231 -1036)" opacity="0.8"><path d="M19.308,17.191H1.692A1.692,1.692,0,0,1,0,15.5V1.692A1.692,1.692,0,0,1,1.692,0H19.308A1.692,1.692,0,0,1,21,1.692V15.5a1.692,1.692,0,0,1-1.692,1.692ZM1.692,1.319a.373.373,0,0,0-.373.373V15.5a.373.373,0,0,0,.373.373H19.308a.373.373,0,0,0,.369-.373V1.692a.373.373,0,0,0-.369-.373Z" transform="translate(231 1036)" fill="#14132b"></path><path d="M10.919,27.83H23.948a.557.557,0,0,0,.465-.887l-1.8-2.44a.557.557,0,0,0-.841-.073l-1.847,1.758-4.287-5.821a.557.557,0,0,0-.917.026L10.437,26.97a.557.557,0,0,0,.481.861Z" transform="translate(224.065 1022.502)" fill="#14132b"></path><circle cx="1.956" cy="1.956" r="1.956" transform="translate(243.597 1039.031)" fill="#14132b"></circle><path d="M-462.989-634.448a1.443,1.443,0,0,0-1.334-1.268,6.475,6.475,0,0,0-1.013.056c-.561-1.282-.942-1.475-2.46-1.227a1.822,1.822,0,0,0-2.326-1.024v-1.673s0-.014,0-.03v-.044c0-.023,0-.051,0-.082s0-.068,0-.107,0-.053,0-.08v-.046l0-.081c0-.015,0-.029,0-.043,0-.057,0-.114,0-.167s0-.127,0-.177v-.115c-.271-1.408-.768-1.951-1.759-1.945s-1.469.554-1.717,1.952c0,.267.013.78.024.948l0,.04v7.142c-.052-.006-.071,0-.074-.01a.806.806,0,0,1-.059-.135,1.913,1.913,0,0,0-.828-1.17,1.847,1.847,0,0,0-2.039.152,1.7,1.7,0,0,0-.538,1.923c.552,1.688,1.123,3.369,1.668,5.059a5.355,5.355,0,0,0,2.176,2.873,7.506,7.506,0,0,0,3.9,1.158,5.659,5.659,0,0,0,5.943-4.156A18.537,18.537,0,0,0-462.989-634.448Zm-1.247,7.078a5.59,5.59,0,0,1-1.3,2.437,4.888,4.888,0,0,1-4.322,1.351,6.256,6.256,0,0,1-2.8-.914,4.3,4.3,0,0,1-1.821-2.365c-.536-1.692-1.112-3.372-1.664-5.059a.75.75,0,0,1,.686-1.067.746.746,0,0,1,.787.582c.365.988.73,1.976,1.087,2.967.1.288.241.536.589.485.367-.054.433-.338.433-.661q-.005-2.777,0-5.553h0q0-2.771,0-5.543c0-.478.2-.749.58-.8a.705.705,0,0,1,.854.763c.022.808.018,1.616.018,2.424,0,1.507-.008,3.013-.006,4.52,0,.357.2.56.5.555s.477-.206.48-.575c.008-.8,0-1.593,0-2.39,0-.617.164-.8.7-.8.507,0,.744.259.746.827,0,.8,0,1.594,0,2.391,0,.414.185.633.5.625.3-.007.475-.222.48-.614s0-.809,0-1.214c0-.048,0-.1,0-.147.024-.509.346-.923.718-.924a.867.867,0,0,1,.719.92c.013.564,0,1.128.005,1.691,0,.407.19.637.5.629s.47-.223.479-.617c.006-.245-.01-.492.017-.735a.647.647,0,0,1,.69-.576.563.563,0,0,1,.637.525A18.233,18.233,0,0,1-464.235-627.37Z" transform="matrix(0.966, -0.259, 0.259, 0.966, 868.209, 1542.759)" fill="#14132b"></path><path d="M-451.762-615.084a5.591,5.591,0,0,1-1.3,2.437,4.888,4.888,0,0,1-4.322,1.351,6.257,6.257,0,0,1-2.8-.914,4.3,4.3,0,0,1-1.821-2.365c-.536-1.692-1.112-3.372-1.664-5.059a.75.75,0,0,1,.686-1.067.746.746,0,0,1,.787.582c.365.988.731,1.976,1.087,2.967.1.288.241.536.589.485.367-.054.433-.338.433-.661q-.006-2.776,0-5.553h0q0-2.771,0-5.543c0-.478.2-.749.58-.8a.7.7,0,0,1,.854.763c.022.808.018,1.616.018,2.424,0,1.507-.008,3.013-.006,4.52,0,.357.2.56.5.555s.477-.206.48-.575c.008-.8,0-1.593,0-2.39,0-.617.164-.8.7-.8.507,0,.744.259.746.827,0,.8,0,1.594,0,2.391,0,.414.185.633.5.625.3-.007.475-.221.48-.613s0-.809,0-1.214c0-.049,0-.1,0-.147.024-.509.346-.923.718-.924a.868.868,0,0,1,.72.92c.012.564,0,1.128.005,1.691,0,.408.19.637.5.629s.47-.223.479-.617c.006-.245-.01-.492.017-.735a.647.647,0,0,1,.69-.576.563.563,0,0,1,.637.525A18.233,18.233,0,0,1-451.762-615.084Z" transform="matrix(0.966, -0.259, 0.259, 0.966, 852.981, 1534.12)" fill="#fff"></path><path d="M-381.06-606.323l0-.107C-381.059-606.391-381.059-606.355-381.06-606.323Z" transform="matrix(0.966, -0.259, 0.259, 0.966, 773.537, 1533.531)"></path><path d="M-380.956-612.1c0,.053,0,.11,0,.167Z" transform="matrix(0.966, -0.259, 0.259, 0.966, 774.807, 1538.629)"></path></g></svg>'
            ],
            'meafe-dualheading' => [
                'name'      => __('Dual Heading', 'mega-elements-addons-for-elementor'),
                'classname' => 'MEAFE_Dualheading',
                'slug'      => 'dualheading',
                'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" width="21" height="11" viewBox="0 0 21 11"><g transform="translate(-556 -1040)"><rect width="21" height="4" rx="2" transform="translate(556 1040)" fill="#14132b" opacity="0.4"></rect><rect width="15" height="4" rx="2" transform="translate(556 1047)" fill="#14132b" opacity="0.4"></rect></g></svg>',

            ],
            'meafe-featurelist' => [
                'name'      => __('Feature Lists', 'mega-elements-addons-for-elementor'),
                'classname' => 'MEAFE_Featurelist',
                'slug'      => 'featurelist',
                'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" width="22.281" height="21" viewBox="0 0 22.281 21"><g transform="translate(-880.506 -1037)"><path d="M8.579,7.36,7.008,7.242a.424.424,0,0,1-.328-.235L6.07,5.554a.385.385,0,0,0-.7,0l-.61,1.454a.353.353,0,0,1-.328.235L2.856,7.36a.383.383,0,0,0-.211.68l1.2,1.032a.334.334,0,0,1,.117.375L3.583,11a.4.4,0,0,0,.586.422L5.53,10.6a.4.4,0,0,1,.4,0l1.36.821A.4.4,0,0,0,7.876,11L7.5,9.447a.433.433,0,0,1,.117-.375l1.2-1.032A.388.388,0,0,0,8.579,7.36Z" transform="translate(878 1031.675)" opacity="0.4"></path><path d="M38.3,18.092H50.071a1.2,1.2,0,1,0,0-2.392H38.3a1.2,1.2,0,1,0,0,2.392Z" transform="translate(851.52 1023.734)" opacity="0.4"></path><path d="M8.579,38.96l-1.572-.117a.378.378,0,0,1-.328-.235l-.61-1.454a.385.385,0,0,0-.7,0l-.61,1.454a.353.353,0,0,1-.328.235l-1.572.117a.383.383,0,0,0-.211.68l1.2,1.032a.334.334,0,0,1,.117.375L3.583,42.6a.4.4,0,0,0,.586.422L5.53,42.2a.4.4,0,0,1,.4,0l1.36.821a.4.4,0,0,0,.586-.422L7.5,41.047a.433.433,0,0,1,.117-.375l1.2-1.032A.392.392,0,0,0,8.579,38.96Z" transform="translate(878 1007.487)" opacity="0.4"></path><path d="M50.071,47.4H38.3a1.2,1.2,0,1,0,0,2.392H50.071a1.2,1.2,0,1,0,0-2.392Z" transform="translate(851.52 999.469)" opacity="0.4"></path><path d="M8.579,70.66l-1.572-.117a.378.378,0,0,1-.328-.235l-.61-1.454a.385.385,0,0,0-.7,0l-.61,1.454a.353.353,0,0,1-.328.235l-1.572.117a.383.383,0,0,0-.211.68l1.2,1.032a.334.334,0,0,1,.117.375L3.583,74.3a.4.4,0,0,0,.586.422L5.53,73.9a.4.4,0,0,1,.4,0l1.36.821a.4.4,0,0,0,.586-.422L7.5,72.747a.433.433,0,0,1,.117-.375l1.2-1.032A.388.388,0,0,0,8.579,70.66Z" transform="translate(878 983.222)" opacity="0.4"></path><path d="M50.071,79.1H38.3a1.2,1.2,0,1,0,0,2.392H50.071a1.2,1.2,0,0,0,1.2-1.2A1.186,1.186,0,0,0,50.071,79.1Z" transform="translate(851.52 975.204)" opacity="0.4"></path></g></svg>'
            ],
            'meafe-services' => [
                'name'      => __('Info Box Grid', 'mega-elements-addons-for-elementor'),
                'classname' => 'MEAFE_Services',
                'slug'      => 'services',
                'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" width="20.812" height="20.364" viewBox="0 0 20.812 20.364"><g transform="translate(-11.307 -12.15)" opacity="0.4"><path d="M31.83,20.219h0a1.123,1.123,0,0,0-.106-.819l-2.483-4.306a1.075,1.075,0,0,0-1.453-.4l-1.849,1.057a7.115,7.115,0,0,0-.766-.423V13.457A1.06,1.06,0,0,0,24.117,12.4H19.441a1.06,1.06,0,0,0-1.057,1.057v1.823a4.977,4.977,0,0,0-.766.423L15.8,14.645a1.073,1.073,0,0,0-1.453.37l-2.562,4.279a1.1,1.1,0,0,0-.132.819,1.2,1.2,0,0,0,.475.66l1.77,1.057a3.368,3.368,0,0,0-.026.5v.423l-1.8,1.03a1.338,1.338,0,0,0-.475.66,1.123,1.123,0,0,0,.106.819l2.483,4.306a1.045,1.045,0,0,0,1.426.4l1.9-1.057a6.032,6.032,0,0,0,.845.475v1.823a1.06,1.06,0,0,0,1.057,1.057h4.7a1.06,1.06,0,0,0,1.057-1.057V29.332a3.565,3.565,0,0,0,.687-.4l1.8,1.057a1.067,1.067,0,0,0,1.453-.37l2.536-4.279a1.04,1.04,0,0,0,.106-.792,1.2,1.2,0,0,0-.475-.66l-1.77-1.057a3.368,3.368,0,0,0,.026-.5,2.272,2.272,0,0,0-.026-.423l1.8-1.03A1.025,1.025,0,0,0,31.83,20.219Zm-1.03-.264L28.713,21.17a.52.52,0,0,0-.264.5,5.745,5.745,0,0,1,.026.66c0,.238-.026.475-.053.74a.536.536,0,0,0,.264.528l2.06,1.241L28.211,29.12l-2.087-1.241a.519.519,0,0,0-.581.026,5.638,5.638,0,0,1-1.109.608.522.522,0,0,0-.317.475v2.219h-4.7V29.041a.542.542,0,0,0-.343-.5,5.115,5.115,0,0,1-1.215-.66.505.505,0,0,0-.581-.026l-2.166,1.162-2.483-4.306,2.087-1.215a.52.52,0,0,0,.264-.5,5.745,5.745,0,0,1-.026-.66c0-.211.026-.449.053-.74a.536.536,0,0,0-.264-.528l-2.06-1.241,2.562-4.279,2.113,1.241a.517.517,0,0,0,.581-.026,4.24,4.24,0,0,1,1.136-.634.516.516,0,0,0,.343-.5V13.43h4.7v2.219a.522.522,0,0,0,.317.475,5.531,5.531,0,0,1,1.162.66.477.477,0,0,0,.555.026L28.29,15.6,30.8,19.954h0l.5.132Z" fill="#14132b" stroke="#14132b" stroke-width="0.5"></path><path d="M38.741,34.7a4.041,4.041,0,1,0,4.041,4.041A4.058,4.058,0,0,0,38.741,34.7Zm0,7.026a2.985,2.985,0,1,1,2.985-2.985A3,3,0,0,1,38.741,41.726Z" transform="translate(-17.028 -16.41)" fill="#14132b" stroke="#14132b" stroke-width="0.5"></path></g></svg>'
            ],
            'meafe-team' => [
                'name'      => __('Team', 'mega-elements-addons-for-elementor'),
                'classname' => 'MEAFE_Team',
                'slug'      => 'team',
                'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" width="21.252" height="19.334" viewBox="0 0 21.252 19.334"><g transform="translate(-582.326 -1200)" opacity="0.4"><circle cx="1.412" cy="1.412" r="1.412" transform="translate(584.141 1203.294)" fill="#14132b"></circle><circle cx="1.412" cy="1.412" r="1.412" transform="translate(587.868 1203.294)" fill="#14132b"></circle><circle cx="1.412" cy="1.412" r="1.412" transform="translate(589.763 1200)" fill="#14132b"></circle><circle cx="1.412" cy="1.412" r="1.412" transform="translate(593.379 1200)" fill="#14132b"></circle><circle cx="1.412" cy="1.412" r="1.412" transform="translate(595.235 1203.294)" fill="#14132b"></circle><path d="M44.994,20.951a1.412,1.412,0,1,1-1.412,1.412A1.412,1.412,0,0,1,44.994,20.951Z" transform="translate(547.989 1182.343)" fill="#14132b"></path><path d="M78.711,20.951A1.412,1.412,0,1,1,77.3,22.363,1.412,1.412,0,0,1,78.711,20.951Z" transform="translate(521.649 1182.343)" fill="#14132b"></path><path d="M2.715,48.861H6.386V42.7H7.762l0-4.975a1.575,1.575,0,0,0-1.573-1.576H2.9a1.575,1.575,0,0,0-1.574,1.576L1.326,42.7H2.715Z" transform="translate(581 1170.473)" fill="#14132b"></path><path d="M36.718,48.861h3.671V42.7h1.376l0-4.975a1.575,1.575,0,0,0-1.573-1.576H36.908a1.575,1.575,0,0,0-1.574,1.576L35.329,42.7h1.389v6.164Z" transform="translate(554.436 1170.473)" fill="#14132b"></path><path d="M70.436,48.861h3.671V42.7h1.376l0-4.975a1.575,1.575,0,0,0-1.573-1.576H70.626a1.575,1.575,0,0,0-1.574,1.576L69.047,42.7h1.389v6.164Z" transform="translate(528.095 1170.473)" fill="#14132b"></path></g></svg>'
            ],
            'meafe-team-carousel' => [
                'name'      => __('Team Carousel', 'mega-elements-addons-for-elementor'),
                'classname' => 'MEAFE_Team_Carousel',
                'slug'      => 'team-carousel',
                'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" width="21.252" height="19.334" viewBox="0 0 21.252 19.334"><g transform="translate(-582.326 -1200)" opacity="0.4"><circle cx="1.412" cy="1.412" r="1.412" transform="translate(584.141 1203.294)" fill="#14132b"></circle><circle cx="1.412" cy="1.412" r="1.412" transform="translate(587.868 1203.294)" fill="#14132b"></circle><circle cx="1.412" cy="1.412" r="1.412" transform="translate(589.763 1200)" fill="#14132b"></circle><circle cx="1.412" cy="1.412" r="1.412" transform="translate(593.379 1200)" fill="#14132b"></circle><circle cx="1.412" cy="1.412" r="1.412" transform="translate(595.235 1203.294)" fill="#14132b"></circle><path d="M44.994,20.951a1.412,1.412,0,1,1-1.412,1.412A1.412,1.412,0,0,1,44.994,20.951Z" transform="translate(547.989 1182.343)" fill="#14132b"></path><path d="M78.711,20.951A1.412,1.412,0,1,1,77.3,22.363,1.412,1.412,0,0,1,78.711,20.951Z" transform="translate(521.649 1182.343)" fill="#14132b"></path><path d="M2.715,48.861H6.386V42.7H7.762l0-4.975a1.575,1.575,0,0,0-1.573-1.576H2.9a1.575,1.575,0,0,0-1.574,1.576L1.326,42.7H2.715Z" transform="translate(581 1170.473)" fill="#14132b"></path><path d="M36.718,48.861h3.671V42.7h1.376l0-4.975a1.575,1.575,0,0,0-1.573-1.576H36.908a1.575,1.575,0,0,0-1.574,1.576L35.329,42.7h1.389v6.164Z" transform="translate(554.436 1170.473)" fill="#14132b"></path><path d="M70.436,48.861h3.671V42.7h1.376l0-4.975a1.575,1.575,0,0,0-1.573-1.576H70.626a1.575,1.575,0,0,0-1.574,1.576L69.047,42.7h1.389v6.164Z" transform="translate(528.095 1170.473)" fill="#14132b"></path></g></svg>'
            ],
            'meafe-testimonial' => [
                'name'      => __( 'Testimonial', 'mega-elements-addons-for-elementor' ),
                'classname' => 'MEAFE_Testimonial',
                'slug'      => 'testimonial',
                'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" width="22.532" height="19.149" viewBox="0 0 22.532 19.149"><g transform="translate(-0.18 -6.53)" opacity="0.4"><path d="M33.513,28.49a7.548,7.548,0,0,0,1.745-4.811c0-4.522-4.121-8.2-9.186-8.2a10.3,10.3,0,0,0-1.84.164.532.532,0,0,0,.19,1.046,9.219,9.219,0,0,1,1.65-.147c4.479,0,8.124,3.2,8.124,7.138a6.529,6.529,0,0,1-1.653,4.314.532.532,0,0,0-.12.446l.5,2.633-2.659-.9a.537.537,0,0,0-.346,0,14.981,14.981,0,0,1-3.842.644c-4.479,0-8.123-3.2-8.123-7.137a.531.531,0,1,0-1.063,0c0,4.522,4.121,8.2,9.186,8.2a16.056,16.056,0,0,0,4.015-.644l3.351,1.137a.531.531,0,0,0,.693-.6Z" transform="translate(-12.547 -6.721)" fill="#14132b"></path><path d="M9.946,10.662,7.929,12.629,8.407,15.4a.533.533,0,0,1-.525.622.51.51,0,0,1-.246-.062L5.144,14.653,2.652,15.962a.531.531,0,0,1-.772-.56l.475-2.773L.342,10.662a.523.523,0,0,1-.134-.545.53.53,0,0,1,.428-.361L3.421,9.35,4.666,6.826a.532.532,0,0,1,.953,0L6.866,9.35l2.786.406a.529.529,0,0,1,.428.361A.534.534,0,0,1,9.946,10.662Z" fill="#14132b"></path><path d="M44.5,35.084H36.336c-.3,0-.549.335-.549.75s.245.75.549.75H44.5c.3,0,.549-.335.549-.75S44.807,35.084,44.5,35.084Z" transform="translate(-26.743 -21.446)" fill="#14132b"></path><path d="M45.053,46.912c0-.415-.245-.75-.549-.75H36.336c-.3,0-.549.335-.549.75s.245.75.549.75H44.5C44.807,47.662,45.053,47.327,45.053,46.912Z" transform="translate(-26.743 -29.766)" fill="#14132b"></path><path d="M36.414,57.238a.762.762,0,0,0,0,1.5h3.779a.762.762,0,0,0,0-1.5Z" transform="translate(-26.743 -38.085)" fill="#14132b"></path></g></svg>'
            ],
            'meafe-testimonial-carousel' => [
                'name'      => __( 'Testimonial Carousel', 'mega-elements-addons-for-elementor' ),
                'classname' => 'MEAFE_Testimonial_Carousel',
                'slug'      => 'testimonial-carousel',
                'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" width="22.532" height="19.149" viewBox="0 0 22.532 19.149"><g transform="translate(-0.18 -6.53)" opacity="0.4"><path d="M33.513,28.49a7.548,7.548,0,0,0,1.745-4.811c0-4.522-4.121-8.2-9.186-8.2a10.3,10.3,0,0,0-1.84.164.532.532,0,0,0,.19,1.046,9.219,9.219,0,0,1,1.65-.147c4.479,0,8.124,3.2,8.124,7.138a6.529,6.529,0,0,1-1.653,4.314.532.532,0,0,0-.12.446l.5,2.633-2.659-.9a.537.537,0,0,0-.346,0,14.981,14.981,0,0,1-3.842.644c-4.479,0-8.123-3.2-8.123-7.137a.531.531,0,1,0-1.063,0c0,4.522,4.121,8.2,9.186,8.2a16.056,16.056,0,0,0,4.015-.644l3.351,1.137a.531.531,0,0,0,.693-.6Z" transform="translate(-12.547 -6.721)" fill="#14132b"></path><path d="M9.946,10.662,7.929,12.629,8.407,15.4a.533.533,0,0,1-.525.622.51.51,0,0,1-.246-.062L5.144,14.653,2.652,15.962a.531.531,0,0,1-.772-.56l.475-2.773L.342,10.662a.523.523,0,0,1-.134-.545.53.53,0,0,1,.428-.361L3.421,9.35,4.666,6.826a.532.532,0,0,1,.953,0L6.866,9.35l2.786.406a.529.529,0,0,1,.428.361A.534.534,0,0,1,9.946,10.662Z" fill="#14132b"></path><path d="M44.5,35.084H36.336c-.3,0-.549.335-.549.75s.245.75.549.75H44.5c.3,0,.549-.335.549-.75S44.807,35.084,44.5,35.084Z" transform="translate(-26.743 -21.446)" fill="#14132b"></path><path d="M45.053,46.912c0-.415-.245-.75-.549-.75H36.336c-.3,0-.549.335-.549.75s.245.75.549.75H44.5C44.807,47.662,45.053,47.327,45.053,46.912Z" transform="translate(-26.743 -29.766)" fill="#14132b"></path><path d="M36.414,57.238a.762.762,0,0,0,0,1.5h3.779a.762.762,0,0,0,0-1.5Z" transform="translate(-26.743 -38.085)" fill="#14132b"></path></g></svg>'
            ],
            'meafe-pricing-table' => [
                'name'      => __( 'Pricing Table', 'mega-elements-addons-for-elementor' ),
                'classname' => 'MEAFE_Pricing_Table',
                'slug'      => 'pricing-table',
                'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" width="22.532" height="19.149" viewBox="0 0 20.11 18"><g id="Layer_2" data-name="Layer 2"><g id="Layer_5" data-name="Layer 5" opacity="0.4"><path d="M11.73,11.21a.15.15,0,0,0-.09,0h-3a.08.08,0,0,0-.07,0,.62.62,0,0,0,0,1.24.08.08,0,0,0,.07,0h3a.15.15,0,0,0,.09,0,.63.63,0,0,0,0-1.24Z"/><path d="M11.73,13.62H8.53a.63.63,0,0,0,0,1.25.08.08,0,0,0,.07,0h3a.15.15,0,0,0,.09,0,.63.63,0,0,0,0-1.25Z"/><path d="M8.45,8.27a2.38,2.38,0,0,0,.62.3,3.07,3.07,0,0,0,.56.12V9a.56.56,0,0,0,.15.37.53.53,0,0,0,.38.16A.53.53,0,0,0,10.69,9V8.66a2,2,0,0,0,.9-.45,1.41,1.41,0,0,0,.46-1.07,1.27,1.27,0,0,0-.38-.95,2.1,2.1,0,0,0-1.06-.5l-.68-.14a.86.86,0,0,1-.42-.18.3.3,0,0,1-.08-.23.42.42,0,0,1,.17-.36.83.83,0,0,1,.56-.16,1.85,1.85,0,0,1,.51.07,1.77,1.77,0,0,1,.41.21.6.6,0,0,0,.32.1h.12a.52.52,0,0,0,.32-.24.56.56,0,0,0,.07-.36.55.55,0,0,0-.2-.35,1.84,1.84,0,0,0-.61-.35,2.77,2.77,0,0,0-.41-.12V3.29a.51.51,0,0,0-.15-.37.53.53,0,0,0-.76,0,.56.56,0,0,0-.15.37v.29A2,2,0,0,0,9,3.8a1.64,1.64,0,0,0-.58.56,1.52,1.52,0,0,0-.21.8c0,.77.47,1.28,1.38,1.47l.67.15a1.06,1.06,0,0,1,.48.18.27.27,0,0,1,.09.21.37.37,0,0,1-.15.31,1.05,1.05,0,0,1-.61.14,2.1,2.1,0,0,1-.66-.09A1.89,1.89,0,0,1,9,7.32a.57.57,0,0,0-.31-.1.45.45,0,0,0-.16,0,.53.53,0,0,0-.29.28.61.61,0,0,0,0,.4A.55.55,0,0,0,8.45,8.27Z"/><path d="M19.25,2H16.78V1.12A1.12,1.12,0,0,0,15.66,0H4.56A1.12,1.12,0,0,0,3.44,1.12V2H.86A.87.87,0,0,0,0,2.88V15.12A.87.87,0,0,0,.86,16H3.44v.88A1.12,1.12,0,0,0,4.56,18h11.1a1.12,1.12,0,0,0,1.12-1.12V16h2.47a.88.88,0,0,0,.86-.88V2.88A.88.88,0,0,0,19.25,2ZM1,15.05V3H3.44v12.1Zm14.67,1.83H4.56V1.12h11.1V16.88Zm3.46-1.83H16.78V3h2.34Z"/></g></g></svg>'
            ],
            'meafe-price-menu' => [
                'name'      => __( 'Price Menu', 'mega-elements-addons-for-elementor' ),
                'classname' => 'MEAFE_Price_Menu',
                'slug'      => 'price-menu',
                'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" width="22.532" height="19.149" viewBox="0 0 17 19.16"><g id="Layer_2" data-name="Layer 2"><g id="Layer_5" data-name="Layer 5" opacity="0.4"><path d="M14,9.31V4a2,2,0,0,0-2-2H11a1,1,0,0,0-1-1H9.58A3.42,3.42,0,0,0,7,0,3.42,3.42,0,0,0,4.42,1H4A1,1,0,0,0,3,2H2A2,2,0,0,0,0,4V16a2,2,0,0,0,2,2H8.58a5.1,5.1,0,0,0,3.25,1.16A5.16,5.16,0,0,0,14,9.31ZM4,2h.87l.3-.34A2.44,2.44,0,0,1,7,1a2.44,2.44,0,0,1,1.83.66l.3.34H10V4H4V2ZM2,17a1,1,0,0,1-1-1V4A1,1,0,0,1,2,3H3V4A1,1,0,0,0,4,5h6a1,1,0,0,0,1-1V3h1a1,1,0,0,1,1,1V9l-.6-.1a5.3,5.3,0,0,0-.57,0,5.11,5.11,0,0,0-2.14.46H3.39a.5.5,0,0,0-.5.5.5.5,0,0,0,.5.5H8.24a4.11,4.11,0,0,0-.69.81l0,0a4,4,0,0,0-.51,1H3.39a.5.5,0,0,0-.5.5.5.5,0,0,0,.5.5H6.74a4.21,4.21,0,0,0-.08.87A4.9,4.9,0,0,0,7,15.71a4.26,4.26,0,0,0,.57,1.15.76.76,0,0,0,.11.14Zm9.83,1a4,4,0,0,1-2.36-.77L9.18,17,9,16.86a3.48,3.48,0,0,1-.81-1.15A3.66,3.66,0,0,1,7.81,14a3.57,3.57,0,0,1,.1-.87h0L8,12.9,8,12.69c0-.06.06-.12.08-.19s.06-.15.1-.22,0,0,0,0a.83.83,0,0,1,.07-.13h0a3.39,3.39,0,0,1,.73-1l0,0a3.93,3.93,0,0,1,1.23-.81,3.22,3.22,0,0,1,.73-.22,3.68,3.68,0,0,1,.82-.09,3.56,3.56,0,0,1,.57,0,4.34,4.34,0,0,1,.6.14,3.32,3.32,0,0,1,.55.22,3.25,3.25,0,0,1,.45.25A4,4,0,0,1,15.85,14,4,4,0,0,1,11.83,18Z"/><path d="M12.28,13.61l-.61-.13a.9.9,0,0,1-.38-.15.3.3,0,0,1-.07-.21.38.38,0,0,1,.15-.32.8.8,0,0,1,.5-.14,1.56,1.56,0,0,1,.46.06,1.51,1.51,0,0,1,.36.18A.55.55,0,0,0,13,13h.1a.43.43,0,0,0,.28-.21.48.48,0,0,0,.07-.31.55.55,0,0,0-.18-.32,1.78,1.78,0,0,0-.54-.31,2.42,2.42,0,0,0-.36-.1v-.25a.48.48,0,0,0-.14-.34.47.47,0,0,0-.33-.14.42.42,0,0,0-.34.15.44.44,0,0,0-.13.33v.25a1.73,1.73,0,0,0-.54.2,1.47,1.47,0,0,0-.52.5,1.36,1.36,0,0,0-.19.7c0,.69.43,1.14,1.23,1.32l.6.12a.89.89,0,0,1,.42.17.21.21,0,0,1,.08.19.34.34,0,0,1-.13.27.92.92,0,0,1-.54.12,2,2,0,0,1-.59-.08,1.66,1.66,0,0,1-.4-.19.56.56,0,0,0-.27-.08l-.15,0a.51.51,0,0,0-.29.6.48.48,0,0,0,.23.31,2,2,0,0,0,.55.27,2.56,2.56,0,0,0,.51.1v.23a.44.44,0,0,0,.13.33.41.41,0,0,0,.34.14.4.4,0,0,0,.33-.14.45.45,0,0,0,.14-.33v-.26a1.68,1.68,0,0,0,.79-.39,1.25,1.25,0,0,0,.41-1,1.14,1.14,0,0,0-.33-.84A2,2,0,0,0,12.28,13.61Z"/></g></g></svg>'
            ],
            'meafe-tabs' => [
                'name'      => __( 'Tabs', 'mega-elements-addons-for-elementor' ),
                'classname' => 'MEAFE_Tabs',
                'slug'      => 'tabs',
                'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" width="22.532" height="19.149" viewBox="0 0 16 14.5"><g id="Layer_2" data-name="Layer 2"><g id="Layer_5" data-name="Layer 5" opacity="0.4"><path d="M5,1V2H1V1H5M5,0H1A1,1,0,0,0,0,1V2A1,1,0,0,0,1,3H5A1,1,0,0,0,6,2V1A1,1,0,0,0,5,0Z"/><path d="M15,3V13.5H1V3H15m0-1H1A1,1,0,0,0,0,3V13.5a1,1,0,0,0,1,1H15a1,1,0,0,0,1-1V3a1,1,0,0,0-1-1Z"/><path d="M4.22,6.64a.58.58,0,1,1,0-1.16h7.2a.58.58,0,1,1,0,1.16Z"/><path d="M4.22,9.1a.58.58,0,1,1,0-1.16h7.2a.58.58,0,1,1,0,1.16Z"/><path d="M7.41,10.35H4.22a.64.64,0,0,0-.58.63.62.62,0,0,0,.58.62H7.41A.62.62,0,0,0,8,11,.64.64,0,0,0,7.41,10.35Z"/><path d="M10,1.52H8a.5.5,0,0,1-.5-.5A.5.5,0,0,1,8,.52h2a.51.51,0,0,1,.5.5A.5.5,0,0,1,10,1.52Z"/><path d="M14,1.5H12a.5.5,0,0,1,0-1h2a.5.5,0,0,1,0,1Z"/></g></g></svg>'
            ],
            'meafe-events' => [
                'name'      => __( 'Events', 'mega-elements-addons-for-elementor' ),
                'classname' => 'MEAFE_Events',
                'slug'      => 'events',
                'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" width="22.532" height="19.149" viewBox="0 0 16 14.5"><g id="Layer_2" data-name="Layer 2"><g id="Layer_5" data-name="Layer 5" opacity="0.4"><path d="M5,1V2H1V1H5M5,0H1A1,1,0,0,0,0,1V2A1,1,0,0,0,1,3H5A1,1,0,0,0,6,2V1A1,1,0,0,0,5,0Z"/><path d="M15,3V13.5H1V3H15m0-1H1A1,1,0,0,0,0,3V13.5a1,1,0,0,0,1,1H15a1,1,0,0,0,1-1V3a1,1,0,0,0-1-1Z"/><path d="M4.22,6.64a.58.58,0,1,1,0-1.16h7.2a.58.58,0,1,1,0,1.16Z"/><path d="M4.22,9.1a.58.58,0,1,1,0-1.16h7.2a.58.58,0,1,1,0,1.16Z"/><path d="M7.41,10.35H4.22a.64.64,0,0,0-.58.63.62.62,0,0,0,.58.62H7.41A.62.62,0,0,0,8,11,.64.64,0,0,0,7.41,10.35Z"/><path d="M10,1.52H8a.5.5,0,0,1-.5-.5A.5.5,0,0,1,8,.52h2a.51.51,0,0,1,.5.5A.5.5,0,0,1,10,1.52Z"/><path d="M14,1.5H12a.5.5,0,0,1,0-1h2a.5.5,0,0,1,0,1Z"/></g></g></svg>'
            ],
        ];
    }

    /**
     * Get widget map for defaults.
     *
     * @return void
     */
    public static function get_widgets_map() {
		$widgets_map = [
			self::get_base_widget_key() => [
				'css' => ['common'],
				'js' => [],
				'vendor' => [
					'js' => ['anime'],
					'css' => []
				]
			],
		];

		$local_widgets_map = self::get_local_widgets_map();
		$widgets_map = array_merge( $widgets_map, $local_widgets_map );

		return apply_filters( 'mega_elements_addons_get_widgets_map', $widgets_map );
	}

    /**
     * Gte witget base key.
     *
     * @return void
     */
	public static function get_base_widget_key() {
		return apply_filters( 'mega_elements_addons_get_base_widget_key', '_mega_elements_addons_base' );
	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public static function register() {

        $inactive_widgets = self::get_inactive_widgets();

		foreach ( self::get_local_widgets_map() as $widget_key => $data ) {
			if ( ! in_array( $widget_key, $inactive_widgets ) ) {
				self::register_widget( $widget_key, $data );
			}
		}
	}

    /**
     * Register active widgets.
     *
     * @param [type] $widget_key
     * @param [type] $data
     * @return void
     */
	protected static function register_widget( $widget_key, $data ) {
		$widget_file = MEGA_ELEMENTS_ADDONS_FOR_ELEMENTOR_PATH . 'includes/widgets/' . $widget_key . '/'. $data['slug'] .'.php';

		if ( is_readable( $widget_file ) ) {

			include_once( $widget_file );

			$widget_class = '\MegaElementsAddonsForElementor\Widget\\' .  $data['classname'];
			if ( class_exists( $widget_class ) ) {
                $add_widget = \Elementor\Plugin::instance()->widgets_manager;
                $add_widget->register_widget_type( new $widget_class );
			}
		}
	}
}

// Initilize.
Widgets_Manager::init();
