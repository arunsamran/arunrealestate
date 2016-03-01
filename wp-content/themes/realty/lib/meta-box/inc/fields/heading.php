<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RWMB_Heading_Field' ) )
{
	class RWMB_Heading_Field extends RWMB_Field
	{
		/*  for PRO users! - *
		 * Enqueue scripts and styles
		 *
		 * @return void
		 */
		static function admin_enqueue_scripts()
		{
			wp_enqueue_style( 'rwmb-heading', RWMB_CSS_URL . 'heading.css', array(), RWMB_VER );
		}

		/*  for PRO users! - *
		 * Show begin HTML markup for fields
		 *
		 * @param mixed $meta
		 * @param array $field
		 *
		 * @return string
		 */
		static function begin_html( $meta, $field )
		{
			return sprintf( '<h4>%s</h4>', $field['name'] );
		}

		/*  for PRO users! - *
		 * Show end HTML markup for fields
		 *
		 * @param mixed $meta
		 * @param array $field
		 *
		 * @return string
		 */
		static function end_html( $meta, $field )
		{
			$id = $field['id'] ? " id='{$field['id']}-description'" : '';

			return $field['desc'] ? "<p{$id} class='description'>{$field['desc']}</p>" : '';
		}
	}
}
