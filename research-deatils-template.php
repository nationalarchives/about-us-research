<?php
/*
Template Name: OA Research details template
*/

get_header();

?>
<div class="container" id="page_wrap" role="main">
    <?php include 'breadcrumb.php'; ?>
<div class="row">
    <div class="col starts-at-full ends-at-two-thirds box clr">
        <div class="heading-holding-banner">
            <h1>
                <span>
                    <span>
                       <?php echo get_the_title(); ?>
                    </span>
                </span>
            </h1>
        </div>
        <div class="breather">
            <span class="entry-meta">
                <?php
                    $other_authors = get_post_meta( $post->ID, 'authors_section_other-authors', true );
                    if (empty ($other_authors)) {
                        echo '<strong>Author:</strong>';
                    } else {
                        echo '<strong>Authors:</strong>';
                    }
                ?>
            </span>
            <span class="entry-meta">
                <?php
                    $lead_author = get_post_meta( $post->ID, 'authors_section_lead-author', true );
                    echo $lead_author;

                    if (!empty ($other_authors)) {
                        echo ', '.$other_authors;
                    }
                ?>
            </span>
            <div class="clearfix"></div>
            <span class="entry-meta"><strong>Date of publication:</strong>
                <?php
                    $date_published = get_post_meta( $post->ID, 'authors_section_date-published', true );
                    $format_date = date('d F Y', strtotime($date_published));
                    echo $format_date;
                ?>
            </span>
            <br />
                <?php
                    $published_by = get_post_meta( $post->ID, 'authors_section_published-by', true );
                    if (!empty($published_by)) {
                        echo '<span class="entry-meta"><strong>Published by:</strong> '.$published_by.'</span>';
                    }
                ?>

            <!--<hr class="line-stroke">-->
            <div class="clearfix"></div>
            <span class="entry-meta"><strong>Keywords:</strong> </span>

                <?php
                //displaying custom taxonomy 'keywords'
                $keywords_terms = wp_get_post_terms($post->ID, 'keywords');
                    $i = 0;
                    foreach ( $keywords_terms as $term ) { $i++;
                        if ( $i > 1 ) {
                            echo ', ';
                        }
                        echo '<span class="entry-meta">'.$term->name.'</span>';
                    }
                ?>

            <hr class="line-stroke">
            <div class="clearfix"></div>
            <?php
                the_content();
            ?>
            <div class="clearfix"></div>
            <!--  <a class="button float-right" href="#">Download PDF (123KB)</a>-->
            <?php
                $research_pdf = get_post_meta( $post->ID, 'authors_section_pdf', true );
                $pdf_size = output_file_size($research_pdf);
                if (!empty ($research_pdf)) {
                    echo '<a class="button float-right" target="_blank" href="'.$research_pdf.'">View (PDF, '.$pdf_size.')</a>';
                }

            ?>
        </div>
        <!--  Research ends here-->
    </div>
    <?php //sidebar comes here
    get_sidebar(  );
    ?>
</div>
</div>





<?php
get_footer();
