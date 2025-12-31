/**
 * SEO Composable for NM Technology
 * Dynamically updates meta tags for Vue Router pages
 * Targets: security systems Albuquerque NM, CCTV installers, access control, fire alarms, network troubleshooting
 */

import { onMounted, onUnmounted } from 'vue';

// Default SEO configuration
const defaultSEO = {
    siteName: 'NM Technology',
    siteUrl: 'https://nmtechnology.us',
    defaultImage: '/images/nm-logo-rmbg.webp',
    phone: '+1-505-750-1169',
    address: {
        street: 'Albuquerque',
        city: 'Albuquerque',
        state: 'NM',
        zip: '87123',
        country: 'US'
    }
};

// Page-specific SEO configurations for target keywords
export const pageSEOConfigs = {
    home: {
        title: 'Security Systems Albuquerque NM | CCTV, Access Control & Fire Alarm Installation | NM Technology',
        description: 'NM Technology provides expert security systems installation in Albuquerque, NM. Commercial CCTV installers, access control installation, fire alarm systems 87123, and network troubleshooting. Call for a free quote!',
        keywords: 'security systems Albuquerque NM, Albuquerque access control installation, fire alarm systems 87123, commercial CCTV installers New Mexico, network troubleshooting Albuquerque',
        path: '/'
    },
    services: {
        title: 'Security Services Albuquerque | CCTV, Fire Alarms, Access Control | NM Technology',
        description: 'Complete security services in Albuquerque, NM: CCTV installation, fire alarm systems, access control, structured cabling, and 24/7 network support across New Mexico.',
        keywords: 'security services Albuquerque, CCTV installation New Mexico, fire alarm technician Albuquerque, access control Albuquerque',
        path: '/services'
    },
    cctv: {
        title: 'Commercial CCTV Installers New Mexico | Security Cameras Albuquerque | NM Technology',
        description: 'Professional commercial CCTV installation in New Mexico. IP cameras, NVR systems, remote monitoring & security camera solutions for Albuquerque businesses.',
        keywords: 'commercial CCTV installers New Mexico, security cameras Albuquerque, CCTV installation Albuquerque NM, IP camera systems',
        path: '/products'
    },
    accessControl: {
        title: 'Access Control Installation Albuquerque | Card Readers & Biometrics | NM Technology',
        description: 'Expert access control installation in Albuquerque, NM. Card readers, keypads, biometric systems for commercial and residential properties. Free estimates.',
        keywords: 'Albuquerque access control installation, card reader installation NM, biometric access control Albuquerque, commercial access control New Mexico',
        path: '/access-control'
    },
    fireAlarms: {
        title: 'Fire Alarm Systems 87123 | Installation & Inspection Albuquerque | NM Technology',
        description: 'NFPA-compliant fire alarm systems in Albuquerque ZIP 87123. Professional installation, annual inspections, and 24/7 monitoring. Fire alarm technician services.',
        keywords: 'fire alarm systems 87123, fire alarm technician Albuquerque, fire alarm installation Albuquerque, NFPA fire alarm inspection NM',
        path: '/fire-alarms'
    },
    network: {
        title: 'Network Troubleshooting Albuquerque | IT Support & Structured Cabling | NM Technology',
        description: 'Professional network troubleshooting in Albuquerque. Wi-Fi diagnostics, structured cabling, switch configuration, and fast business IT support across New Mexico.',
        keywords: 'network troubleshooting Albuquerque, structured cabling Albuquerque, IT support New Mexico, business network repair Albuquerque',
        path: '/network'
    },
    contact: {
        title: 'Contact NM Technology | Security Systems Quote Albuquerque NM',
        description: 'Contact NM Technology for security systems, CCTV, fire alarms, and access control installation in Albuquerque, NM. Get a free quote today!',
        keywords: 'contact NM Technology, security quote Albuquerque, CCTV estimate New Mexico',
        path: '/contact'
    },
    quote: {
        title: 'Get a Free Security Quote | NM Technology Albuquerque',
        description: 'Request a free quote for security systems, CCTV installation, fire alarms, or access control in Albuquerque and New Mexico. Fast response guaranteed.',
        keywords: 'security quote Albuquerque, free CCTV estimate NM, fire alarm quote 87123',
        path: '/quote'
    }
};

/**
 * Update document meta tags dynamically
 * @param {Object} config - SEO configuration object
 */
export function updateMetaTags(config) {
    const {
        title,
        description,
        keywords,
        path = '/',
        image = defaultSEO.defaultImage
    } = config;

    const fullUrl = `${defaultSEO.siteUrl}${path}`;
    const fullImageUrl = image.startsWith('http') ? image : `${defaultSEO.siteUrl}${image}`;

    // Update title
    document.title = title;

    // Helper to update or create meta tag
    const setMeta = (name, content, isProperty = false) => {
        const attr = isProperty ? 'property' : 'name';
        let meta = document.querySelector(`meta[${attr}="${name}"]`);
        if (!meta) {
            meta = document.createElement('meta');
            meta.setAttribute(attr, name);
            document.head.appendChild(meta);
        }
        meta.setAttribute('content', content);
    };

    // Basic meta tags
    setMeta('description', description);
    if (keywords) setMeta('keywords', keywords);

    // Open Graph
    setMeta('og:title', title, true);
    setMeta('og:description', description, true);
    setMeta('og:url', fullUrl, true);
    setMeta('og:image', fullImageUrl, true);
    setMeta('og:type', 'website', true);
    setMeta('og:site_name', defaultSEO.siteName, true);

    // Twitter
    setMeta('twitter:card', 'summary_large_image');
    setMeta('twitter:title', title);
    setMeta('twitter:description', description);
    setMeta('twitter:image', fullImageUrl);

    // Update canonical URL
    let canonical = document.querySelector('link[rel="canonical"]');
    if (!canonical) {
        canonical = document.createElement('link');
        canonical.setAttribute('rel', 'canonical');
        document.head.appendChild(canonical);
    }
    canonical.setAttribute('href', fullUrl);
}

/**
 * Vue composable for SEO management
 * @param {string} pageKey - Key from pageSEOConfigs or custom config object
 */
export function useSEO(pageKey) {
    const config = typeof pageKey === 'string' 
        ? pageSEOConfigs[pageKey] 
        : pageKey;

    if (!config) {
        console.warn(`SEO config not found for: ${pageKey}`);
        return;
    }

    onMounted(() => {
        updateMetaTags(config);
    });

    return {
        updateMetaTags,
        config
    };
}

/**
 * Generate LocalBusiness JSON-LD schema
 */
export function generateLocalBusinessSchema() {
    return {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "@id": `${defaultSEO.siteUrl}/#localbusiness`,
        "name": defaultSEO.siteName,
        "description": "Expert installation of CCTV, security systems, fire alarms, access control, and structured cabling in Albuquerque and New Mexico.",
        "url": defaultSEO.siteUrl,
        "telephone": defaultSEO.phone,
        "address": {
            "@type": "PostalAddress",
            "addressLocality": defaultSEO.address.city,
            "addressRegion": defaultSEO.address.state,
            "postalCode": defaultSEO.address.zip,
            "addressCountry": defaultSEO.address.country
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": 35.0844,
            "longitude": -106.6504
        },
        "areaServed": [
            { "@type": "City", "name": "Albuquerque" },
            { "@type": "State", "name": "New Mexico" }
        ],
        "priceRange": "$$"
    };
}

/**
 * Inject JSON-LD schema into page
 * @param {Object} schema - JSON-LD schema object
 * @param {string} id - Unique ID for the script tag
 */
export function injectSchema(schema, id = 'dynamic-schema') {
    // Remove existing schema with same ID
    const existing = document.getElementById(id);
    if (existing) existing.remove();

    const script = document.createElement('script');
    script.id = id;
    script.type = 'application/ld+json';
    script.textContent = JSON.stringify(schema);
    document.head.appendChild(script);
}

export default useSEO;
