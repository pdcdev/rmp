<?php
/*
    Template Name: Practice - Profile
*/
get_header(); ?>
<nav class="subnav practice_sub">
    <div>
        <?php
            $args = array(
                'menu' => 'practice_menu',
                'depth' => '0',
                'container' => '',
                'echo' => false
            );
            echo wp_nav_menu( $args );
        ?>
    </div>
</nav>
<div class="post_header">

</div>
<section class="layout fadein">
    <article class="project_body">
        <h3>Office History</h3>
        <div class="description columned">
            <p>Richard Meier received his architectural training at Cornell University and established his own office in New York City in 1963. He has received the highest honors in the field including the Pritzker Prize for Architecture, the Gold Medals of the American Institute of Architects and the Royal Institute of British Architects as well as the Praemium Imperiale from the Japan Art Association.</p>

            <p>For over five decades, Richard Meier &amp; Partners has been selected to create important works in both the public and private spheres. We aspire to thoughtful, elegant contemporary architecture that exceeds our clients’ expectations for beauty and form, and fulfills complex programmatic and operational needs.</p>

            <p>The work of Richard Meier &amp; Partners is instantly recognizable and internationally respected. Our projects have received 30 National Honor Awards from the American Institute of Architects and over 50 from the New York AIA and other regional chapters.</p>

            <p>Our offices in New York and Los Angeles employ a multicultural staff of talented professionals that has produced construction documents, and supervised construction, in 18 countries and 16 languages. The firm is led by Richard Meier and six partners – Michael Palladino, James R. Crawford, Bernhard Karpf, Vivian Lee, Reynolds Logan and Dukho Yeon – and maintains an international practice.</p>

            <p>Our practice has extensive experience across a broad range of building types and sizes: cultural facilities, government offices, libraries and educational buildings, media production facilities, industrial research complexes, corporate headquarters, hotels and private residences.</p>

            <p>The firm is well known for the The Getty Center in Los Angeles, federal courthouses on Long Island and in Phoenix, the Jubilee Church in Rome, and the iconic Charles and Perry Street Towers in New York City. We have produced important office buildings and headquarters in the United States and across Europe in Germany, France, Switzerland and the Netherlands for clients including Canal+, Siemens, KNP, Daimler Benz, Olivetti, Renault and SwissAir.</p>

            <p>We have also built nearly 20 museums, including the Barcelona Museum of Contemporary Art and, more recently, the Burda and Arp Museums in Germany. We currently have new projects in North America, South America, Europe and Asia.</p>

        </div>
    </article>
    <article class="project_body">
        <h3>Design Philosophy</h3>
        <div class="description columned">
            <p>The principles that guide our work are rooted in timeless, classical design issues such as Site, Order, and the use of Natural Light that are not unique to period, style, or context. Modern architecture provides us with an optimistic view of contemporary life, while complimenting its context with the exploration of other essential values that are of our time: Program, Technology, Sustainability, Collaboration, and Image. With these basic issues in mind we strive to create works of beauty and elegance that enhance any environment.</p>

            <h4>Site &amp; Context</h4>
            <p>Our primary site goal is to create a strong sense of “place,” by enhancing or transforming the existing site in a unique and provocative way. Whether urban, suburban, or the open landscape, we search the context of each project individually for clues that inspire a formal idea about issues of organization, scale, and location that provoke a strong dialog with its setting.</p>

            <h4>Program</h4>
            <p>Great buildings have simple rational diagrams that are the essence of their organization. That diagram is a catalyst for all subsequent design decisions and development. We focus on clear organization of public and private spaces, reinforcing it with an emphasis on primary and secondary circulation systems. Special emphasis is given to unique elements of the program by form and placement. Those ideas are refined in the massing and façade composition, rationally integrated structural systems, and using natural light in ways that reinforce a strong sense of order.</p>

            <h4>Order/ Geometry</h4>
            <p>Harmonious proportion and scale are fundamental considerations in our work.  Underlying a fluid imaginative conceptual approach to any project is the rational organization of building components based on geometric proportioning systems derived from the golden section employed by the Greeks and the Romans.  An underlying building grid based on the scale of the human body and common building materials is then organized into larger building units that yield primary and secondary systems that regulate the design of structure and basic rhythms in elements such as facades and the massing of the building as a whole.</p>

            <h4>Image</h4>
            <p>Every project has its own unique opportunity for expression. Regardless of the site, program, and budget issues that may vary with any project, our primary goal is to create beautiful things – simple expressions of the essence of the Program and Vision. A limited palette of materials is used, with an emphasis on lightness, transparency, and precision assembly.</p>
             
            <h4>Light</h4>
            <p>Natural light is a most fundamental element central to all our work, and is as much a building material as concrete and stone. It is manipulated to shape space, lend spirit, mark the passage of time and presence of the sky, all elements essential to a rich architectural experience. Our obsession with light simultaneously includes an ambition to utilize the immediacy of natural light and to integrate both proven traditional methods and new technologies to harvest it.</p>

            <h4>Technology and Sustainability</h4>
            <p>Decades of work in Europe, with stringent regulations governing natural ventilation, daylight, and energy consumption has long inspired us toward energy and environmental performance in our design process. The development and application of new materials and technologies are driven by the economic realities of each project, yet we consider sustainability and new building technology extremely important issues. We make intelligent use of the world’s limited natural resources, including those freely available as the sun’s warmth and light, natural breezes for ventilation and cooling, and the integral nature of landscaping and its influence on a site’s micro-climate.</p>

            <h4>Collaboration</h4>
            <p>Creativity is not an individual matter in the 21st Century. The program needs of today’s more innovative and professional clients, and the advanced technologies that best support them, have become more complex. We believe the best buildings are made in an intensely collaborative process where our clients are an integral part of an intelligent working group that includes the leading building systems engineers and consultants of our time. We build teams with talented and motivated individuals who share our vision and passion to do more with less.</p>
        </div>
    </article>
</section>

<?php get_footer(); ?>