<?php
/* 
*************************************************************************** 
Cole este codigo no functions.php do seu template ativo, use um tema filho 
*************************************************************************** 
*/
// Aula 01 - Shortcode

add_shortcode( 'point-post-forms', 'point_aula01_post_forms' );
function point_aula01_post_forms( $atts ) {
	$atts = shortcode_atts( array(
		'news' => '',
		'report' => ''
	), $atts, 'point-post-forms' );

	$news = $atts['news'];
	$report = $atts['report'];
	
	// Deve funcionar bem com qualquer plugin de formulario de contato que forneça um shortcode
	// Não esqueça de neste caso remover os colchetes do codigo dos  plugins de contato
	if ( is_user_logged_in() ) {
		$html = do_shortcode( '['.$report.']' );
	} else {
		$html = do_shortcode( '['.$news.']' );
	}

	// Descomente o bloco abaixo para usar exclisivamente com o plugin contact form 7 conforme mostrado na aula
	// Não esqueça de neste caso basta informar apenas o id dos formulários
	/*
	if ( $user ) {
        // Use a função wpcf7_form() para exibir o formulário do Contact Form 7
        $html =  do_shortcode('[contact-form-7 id="' . $news . '" title="Formulário de Newsletter"]');
    } else {
        // Use a função wpcf7_form() para exibir o formulário do Contact Form 7
        $html =  do_shortcode('[contact-form-7 id="' . $report . '" title="Formulário de Reportar Erros"]');
    }
	*/
	return $html;	

}

