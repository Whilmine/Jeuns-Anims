<?php
/*
Template Name: 404
*/

get_header( "pages" );

?>

    <div class="error-404 not-found card">
        <div class="container">
            <div class="row">
                <div class="page-404_content">
                    <span class="titlefont second-title-color third-title text-a">
                         Cette page est indisponible pour le moment,  ou n'existe pas !
                    </span>
                    <span class="flex-row ">
                        Mais vous pouvez  contintuer à chercher

                        <div class="404-search">
                            <?php
                                get_search_form();
                            ?>
                        </div>

                        ou bien revenir sur vos  pas et
                        <a href="<?php echo get_site_url();?>" class="cta page-404--button "> retourner à l'accueil</a>
                    </span>
                </div>
            </div>
        </div>
    </div>




<?php get_footer(); ?>
