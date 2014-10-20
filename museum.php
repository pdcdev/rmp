<?php
/*
    Template Name: Projects - Museum
*/
get_header(); ?>
<nav class="subnav projects_sub">
    <div>
        <?php
            $args = array(
                'menu' => 'projects',
                'depth' => '1',
                'container' => '',
                'echo' => false
            );
            echo wp_nav_menu( $args );
        ?>
    </div>
</nav>
<div class="post_header">
    <div class="info">
    </div>
</div>
<section class="layout fadein">
    <article class="project_body">
        <div>
            <h5>Richard Meier Modem Museum</h5>
        </div>
        <div class="description columned">
            <p>The Richard Meier Model Museum occupies 15,000-square feet and features architectural projects from the 1960’s to the present, sculptures and collages by Richard Meier, and 1,000 books and magazines from Richard Meier’s personal library. Most prominent in the museum are large scale presentation models and study models of the Getty Center in Los Angeles, an institution widely regarded as Mr. Meier’s most ambitious project and one that required fifteen years to complete.</p>

            <p>Some of the iconic projects exhibited on the space include the Smith House, the Neugebauer Residence and the High Museum of Art. Other projects on view are well-known architectural projects such as the Perry Street Towers, the Ara Pacis Museum, and the recently completed Arp Museum in Germany. In addition, some unbuilt competition proposals for the World Trade Center Memorial, the New York Avery Fisher Hall, and the Bibliothèque Nationale de France. Visitors to the space will have an opportunity to study Meier’s complex design process seeing prominent buildings and projects from his entire work history.</p>

            <p>Richard Meier comments: “The new museum is part of a larger cultural complex in Jersey City, and we will have a library, space for exhibitions, and an archive. Eventually the library will be full of art and architecture books, and as the collection continues to grow with new projects it will become a resource and research center for students, scholars and the general public.</p>

            <p>It is an honor to have my collages, sculptures and our Firm’s work on display at the new space, a museum that we designed and represents the design philosophy of Richard Meier &amp; Partners. We are very pleased to exhibit the models, drawings and images that illustrate the ideas and principles that guide our work.”</p>

            <p>Richard Meier has over the years developed his own distinctive and dynamic style of architecture to become one of America's most influential and widely emulated architects. His work celebrates natural light and space in response to the environs in which it stands, thereby creating sublime spaces of aesthetic illumination and enlightened cultural values.</p>
        </div>
    </article>

    <?php if( get_field( 'museum_gallery' ) ) : ?>
    <article class="grid_six fadein">
        <div class="project_media_nav">
            <ol>
                <?php $images = get_field('museum_gallery'); ?>
                <?php if( $images ): ?>
                    <?php foreach( $images as $image ):

                        $attachment_id = $image['id'];
                        $large_image = wp_get_attachment_image_src( $attachment_id, 'large' );
                        $thumbnail_image = wp_get_attachment_image_src( $attachment_id, 'project_thumb' );
                    ?>
                    <li>
                        <a class="fancybox" rel="images" href="<?php echo $large_image[0]; ?>" ><img src="<?php echo $thumbnail_image[0] ?>" alt="" /></a>
                    </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ol>
        </div>
    </article>
    <?php endif; ?>
        <article class="project_body">
        <h5>Upcoming</h5>
        <div class="museum_events">

            <div class="museum_event">
                <div class="event_info">
                    <p class="event_date">16 Feburary, 2015</p>
                    <p class="event_title">New model featured - Suburban House Prototype, 1976</p>
                    <div>
                        <p>The purpose of the project is to suggest an alternative to the ubiquitous suburban “ranch” house. This compact prototype, for a typical half-acre tract, offers the suburban resident both a sense of community and privacy from his neighbors. While the yard is shared in the party-wall configurations, the elevating of the garden to roof level provides each family with its own piece of nature and an overview of the surrounding landscape. The vertical organization not only gives each interior space greater amplitude, but at the scale of the neighborhood, the three-story double and quadruple modules afford a density and character lacking in the usual suburban development.</p>
                    </div>
                </div>
                <div class="event_image">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/suburban_house.jpg">
                </div>
            </div>
        </div>
    </article>
    <article class="project_body">
        <h5>Planning Your Visit</h5>
        <div class="museum_visit">
            <div class="tours">
                <p><span>Tours</span></p>
                <p>The Richard Meier Model Museum offers tours for individuals and groups by appointment Monday-Friday between the hours of 10:00AM to 5:00PM. Please contact <a href="mailto:m.museum@richardmeier.com">m.museum@richardmeier.com</a> to schedule your visit. Advance reservations for appointments are required.</p>
            </div>
            <div>
                <ul>
                    <li>Tours run approximately 45 minutes and are led by the firm’s Archivist.</li>
                    <li>Please let us know how many people will be in your group and if your group has a particular interest or focus for your visit.</li>
                    <li>Please inform us of any changes or cancellations at least 24 hours in advance.</li>
                    <li>The Model Museum is closed on the following holidays: New Year’s Day, Presidents Day, Memorial Day, Independence Day, Labor Day, Thanksgiving Day &amp; day after, Christmas Day.</li>
                </ul>
            </div>
<!--             <div>
                <p><span>Visitor Guidelines</span></p>
            <ul>
                <li>Advance reservations for appointments are required.</li>
                <li>Please inform us of any changes or cancellations at least 24 hours in advance.</li>
                <li>In order to protect the collection no food or beverages are permitted.</li>
                <li>Bags pose hazards to the collection; visitors are required to check all large bags.</li>
            </ul>
            </div> -->
        </div>
    </article>

    <article class="project_body">
        <h5>Directions</h5>
        <div class="description columned">
            <p><span>Richard Meier Model Museum<br />
            888 Newark Avenue, 2nd Floor<br />
            Jersey City, NJ 07306</span></p>
            
            <p><span>PATH from Lower Manhattan:</span><br />
            At the PATH station at the World Trade Center, take the Newark bound line to Journal Square. Journal Square is the third stop after leaving the WTC. Exit the Journal Square PATH Station, walk north along John F. Kennedy Blvd. and then west onto Newark Avenue.</p>

            <p><span>PATH from 6th Avenue Manhattan:</span><br />
            The PATH train runs along 6th Avenue with stations at 33rd Street, 23rd Street, 14th Street, 9th Street, and Christopher Street. Take the Journal Square bound line to Journal Square. Journal Square is the third stop after Christopher Street. Exit the Journal Square PATH Station, walk north along John F. Kennedy Blvd. several blocks and then west onto Newark Avenue.</p>

            <p><span>By Car from the Holland Tunnel:</span><br />
            Stay to the left and follow signs for Kennedy Blvd. Continue until the end which will be Kennedy Blvd. Turn left onto Kennedy Blvd., and right onto Newark Ave. Drive through the next traffic light and down the hill. The Mana Contemporary building is a large brick structure on the right. Free parking is available on-site.</p>

            <p><span>By Car from the Lincoln Tunnel:</span><br />
            Merge onto 3 East toward 1 and 9 South/US 9 South, continue on 1 and 9. Take the ramp toward Rt. 7 West /US 1 and 9 Truck/Tonnelle Avenue – Jersey City, turn right onto Tonnellle and right onto Newark Ave. The Mana Contemporary building is a large brick structure on the right. Free parking is available on-site.</p>

            <p><span>By Car from the New Jersey Turnpike:</span><br />
            Take Exit 15E and bear to the right for the Jersey City exit. Follow signs for 1 and 9 North, take this until Newark Ave., and turn right onto Newark Ave. The Mana Contemporary building is the second building on the left. Free parking is available on-site.</p>
            <p></p>
        </div>
    </article>
    <aside class="map">
        <div id="map-canvas">map</div>
    </aside>
<!--     <article class="project_body">
        <h5>Events</h5>
        <div class="museum_events">

            <div class="museum_event">
                <div class="event_info">
                    <p class="event_date">16 Feburary, 2015</p>
                    <p class="event_title">New model featured - Suburban House Prototype, 1976</p>
                    <div>
                        <p>The purpose of the project is to suggest an alternative to the ubiquitous suburban “ranch” house. This compact prototype, for a typical half-acre tract, offers the suburban resident both a sense of community and privacy from his neighbors. While the yard is shared in the party-wall configurations, the elevating of the garden to roof level provides each family with its own piece of nature and an overview of the surrounding landscape. The vertical organization not only gives each interior space greater amplitude, but at the scale of the neighborhood, the three-story double and quadruple modules afford a density and character lacking in the usual suburban development.</p>
                    </div>
                </div>
                <div class="event_image">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/suburban_house.jpg">
                </div>
            </div>

            <div class="museum_event">
                <div class="event_info">
                    <p class="event_date">16 Feburary, 2015</p>
                    <p class="event_title">Featured Model: The Getty Center 1⁄4” Scale Model</p>
                    <div>
                        <ul>
                            <li>The largest model in the collection is of The Getty Center, it is 21’ x 37’ x 5’.</li>
                            <li>The model is comprised of seventeen pieces and each piece is on wheels.</li>
                            <li>The model is so large it had to be photographed on a sound stage in Los Angeles.</li>
                            <li>The model took two years to complete.</li>
                            <li>Aside from the Richard Meier Model Museum, the model has been exhibited at a Richard Meier retrospective at the Jeau de Paume in Paris, France in 1999.</li>
                        </ul>
                    </div>
                </div>
                <div class="event_image">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/getty.jpg">
                </div>
            </div>

            <div class="museum_event">
                <div class="event_info">
                    <p class="event_date">16 Feburary, 2015</p>
                    <p class="event_title">Richard Meier Model Museum Open For Public Event</p>
                    <div>
                        <p>The Richard Meier Model Museum will be open on Sunday September 14, 2014 for a public event at Mana Contemporary from 1:00 PM to 7:00 PM. Mana Contemporary will provide shuttle service to and from New York City.</p>
                    </div>
                </div>
                <div class="event_image">
                </div>
            </div>

            <div class="museum_event">
                <div class="event_info">
                    <p class="event_date">10 October, 2014</p>
                    <p class="event_title">Archives Week</p>
                    <div>
                        <p>The Richard Meier Model Museum will participate in Archives Week Friday October 10th, 2014. Learn more about archives week here: <a href="http://www.nycarchivists.org" target="_blank">nycarchivists.org</a></p>
                    </div>
                </div>
                <div class="event_image">
                </div>
            </div>
        </div>
    </article> -->
</section>
<?php get_footer(); ?>