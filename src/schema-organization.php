<?php
add_action('wp_head', function() {
    $schema = array(
        '@context'  => "http://schema.org",
        '@type'     => "Organization",
        'name'      => get_field('legal_name', 'option'),
        'url'       => get_field('url', 'option'),
		'address'   => array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => get_field('streetAddress', 'option'),
            'postalCode'      => get_field('postalcode', 'option'),
            'addressLocality' => get_field('addresslocality', 'option'),
            'addressRegion'   => get_field('addressregion', 'option'),
            "addressCountry"  => get_field('addresscountry', 'option'),
        ),
	);
/// LOGO
    if (get_field('logo', 'option')) {
        $schema['logo'] = get_field('logo', 'option');
    }

    if (get_field('foundingdate', 'option')) {
        $schema['foundingDate'] = get_field('foundingdate', 'option');
    }

    if (get_field('founders', 'options')) {
        $schema['founders'] = array();

        while (have_rows('founders', 'options')) : the_row();

            $founders = array(
                '@type'       => 'Person',
                'name' => get_sub_field('name'),
            );
            if (get_sub_field('name')) {
                get_sub_field('name');
            }
            array_push($schema['founders'], $founders);
        endwhile;
    }
/// SOCIAL MEDIA
    if (have_rows('sameas', 'option')) {
        $schema['sameAs'] = array();
            while (have_rows('sameas', 'option')) : the_row();
                array_push($schema['sameAs'], get_sub_field('social_media_url'));
            endwhile;
    }
// /// IMAGE
    if (get_field('company_image', 'option')) {
        $schema['image'] = get_field('company_image', 'option');
    }

/// CONTACT POINTS
    if (get_field('contactpoint', 'options')) {
        $schema['contactPoint'] = array();

        while (have_rows('contactpoint', 'options')) : the_row();

            $contacts = array(
                '@type'       => 'ContactPoint',
                'contactType' => get_sub_field('contact_type'),
                'telephone'   => '+48' . get_sub_field('nr_telefonu'),
                'areaServed'   => get_sub_field('areaserved'),
                'email'   => get_sub_field('email'),
            );

            if (get_sub_field('option')) {
                $contacts['contactOption'] = get_sub_field('option');
            }

            array_push($schema['contactPoint'], $contacts);

        endwhile;
    }


    
    echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
});

