/**
 * AI SEO Optimization Composable
 * Provides structured data and meta information optimized for AI search engines
 * (ChatGPT, Perplexity, Claude, Google SGE, Bing Chat, etc.)
 */

import { useHead } from '@unhead/vue'

export function useAISEO() {
  const baseUrl = 'https://nmtechnology.us'
  
  const businessInfo = {
    name: 'NM Technology Integrated Solutions',
    alternateName: 'NM Technology',
    description: 'Professional low voltage systems integrator in Albuquerque, New Mexico. Specializing in CCTV surveillance, fire alarm systems, burglar/security alarms, access control, structured cabling, networking, and smart-hands services.',
    url: baseUrl,
    telephone: '+1-505-659-5097', // Replace with actual phone
    email: 'info@nmtechnology.us',
    address: {
      '@type': 'PostalAddress',
      addressLocality: 'Albuquerque',
      addressRegion: 'NM',
      addressCountry: 'US',
      postalCode: '87123' // Update with actual zip
    },
    geo: {
      '@type': 'GeoCoordinates',
      latitude: 35.0844,
      longitude: -106.6504
    },
    areaServed: [
      {
        '@type': 'City',
        name: 'Albuquerque',
        containedInPlace: {
          '@type': 'State',
          name: 'New Mexico'
        }
      },
      {
        '@type': 'City',
        name: 'Rio Rancho',
        containedInPlace: {
          '@type': 'State',
          name: 'New Mexico'
        }
      },
      {
        '@type': 'City',
        name: 'Placitas',
        containedInPlace: {
          '@type': 'State',
          name: 'New Mexico'
        }
      },
      {
        '@type': 'City',
        name: 'Los Lunas',
        containedInPlace: {
          '@type': 'State',
          name: 'New Mexico'
        }
      }
    ],
    services: [
      'CCTV Surveillance Systems Installation, Service & Inspection',
      'Fire Alarm Installation, Service & Inspection',
      'Burglar Alarm Systems Installation, Service & Inspection',
      'Security Alarm Monitoring, Installation, Service & Inspection',
      'Access Control Systems Installation, Service & Inspection',
      'Network Infrastructure Installation, Service & Inspection',
      'Structured Cabling Installation, Service & Inspection',
      'Smart Hands Services Installation, Service & Inspection',
      'Low Voltage Systems Integration Installation, Service & Inspection',
      'Fire Alarm Systems',
      'Burglar Alarm Systems',
      'Security Alarm Monitoring,',
      'Access Control Systems',
      'Network Infrastructure',
      'Structured Cabling',
      'Smart Hands Services',
      'Low Voltage Systems Integration'
    ]
  }

  /**
   * Generate LocalBusiness structured data
   */
  const getLocalBusinessSchema = () => {
    return {
      '@context': 'https://schema.org',
      '@type': 'LocalBusiness',
      '@id': `${baseUrl}/#organization`,
      name: businessInfo.name,
      alternateName: businessInfo.alternateName,
      description: businessInfo.description,
      url: businessInfo.url,
      telephone: businessInfo.telephone,
      email: businessInfo.email,
      address: businessInfo.address,
      geo: businessInfo.geo,
      areaServed: businessInfo.areaServed,
      priceRange: '$$',
      openingHoursSpecification: [
        {
          '@type': 'OpeningHoursSpecification',
          dayOfWeek: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
          opens: '08:00',
          closes: '17:00'
        }
      ],
      hasOfferCatalog: {
        '@type': 'OfferCatalog',
        name: 'Security & Low Voltage Services',
        itemListElement: businessInfo.services.map((service, index) => ({
          '@type': 'Offer',
          itemOffered: {
            '@type': 'Service',
            name: service,
            provider: {
              '@type': 'LocalBusiness',
              name: businessInfo.name
            },
            areaServed: businessInfo.areaServed
          }
        }))
      }
    }
  }

  /**
   * Generate Service structured data for specific service pages
   */
  const getServiceSchema = (serviceName, description, additionalInfo = {}) => {
    return {
      '@context': 'https://schema.org',
      '@type': 'Service',
      name: serviceName,
      description: description,
      provider: {
        '@type': 'LocalBusiness',
        name: businessInfo.name,
        address: businessInfo.address,
        telephone: businessInfo.telephone,
        areaServed: businessInfo.areaServed
      },
      areaServed: businessInfo.areaServed,
      serviceType: serviceName,
      ...additionalInfo
    }
  }

  /**
   * Set AI-optimized meta tags for a page
   */
  const setPageMeta = ({ title, description, keywords, canonical, schema }) => {
    const fullTitle = title ? `${title} | NM Technology` : 'NM Technology - Security & Low Voltage Systems | Albuquerque, NM'
    const fullDescription = description || businessInfo.description
    
    useHead({
      title: fullTitle,
      meta: [
        // Standard meta tags
        { name: 'description', content: fullDescription },
        { name: 'keywords', content: keywords || 'security systems, fire alarm, burglar alarm, CCTV, access control, Albuquerque, Rio Rancho, New Mexico' },
        
        // Open Graph for AI crawlers
        { property: 'og:title', content: fullTitle },
        { property: 'og:description', content: fullDescription },
        { property: 'og:type', content: 'website' },
        { property: 'og:url', content: canonical || baseUrl },
        { property: 'og:locale', content: 'en_US' },
        
        // Twitter Card
        { name: 'twitter:card', content: 'summary_large_image' },
        { name: 'twitter:title', content: fullTitle },
        { name: 'twitter:description', content: fullDescription },
        
        // Geo meta tags for local SEO
        { name: 'geo.region', content: 'US-NM' },
        { name: 'geo.placename', content: 'Albuquerque' },
        { name: 'geo.position', content: '35.0844;-106.6504' },
        { name: 'ICBM', content: '35.0844, -106.6504' },
        
        // AI-specific hints
        { name: 'robots', content: 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1' },
        { name: 'googlebot', content: 'index, follow' },
        { name: 'bingbot', content: 'index, follow' },
      ],
      link: [
        { rel: 'canonical', href: canonical || baseUrl }
      ],
      script: schema ? [
        {
          type: 'application/ld+json',
          children: JSON.stringify(schema)
        }
      ] : []
    })
  }

  /**
   * CCTV Service SEO
   */
  const setCCTVPageSEO = () => {
    const schema = getServiceSchema(
      'CCTV Surveillance Camera Installation',
      'Professional CCTV surveillance camera installation and monitoring services in Albuquerque, Rio Rancho, and surrounding New Mexico areas. Commercial and residential security camera systems.',
      {
        serviceOutput: 'Security camera system installation and monitoring',
        additionalType: 'SecuritySystemInstallation'
      }
    )

    setPageMeta({
      title: 'CCTV Security Cameras - Albuquerque & Rio Rancho',
      description: 'Professional CCTV surveillance camera installation in Albuquerque, Rio Rancho, Placitas, and Los Lunas, NM. Commercial and residential security camera systems with remote monitoring.',
      keywords: 'CCTV installation Albuquerque, security cameras Rio Rancho, surveillance systems New Mexico, IP cameras, NVR systems',
      canonical: `${baseUrl}/cctv`,
      schema: [getLocalBusinessSchema(), schema]
    })
  }

  /**
   * Fire Alarm Service SEO
   */
  const setFireAlarmPageSEO = () => {
    const schema = getServiceSchema(
      'Fire Alarm System Installation',
      'NFPA-compliant fire alarm system design, installation, and inspection services in Albuquerque and surrounding areas. Commercial fire detection and notification systems.',
      {
        serviceOutput: 'Fire alarm system installation and monitoring',
        additionalType: 'FireAlarmInstallation'
      }
    )

    setPageMeta({
      title: 'Fire Alarm Systems - NFPA Compliant Installation',
      description: 'Professional fire alarm installation in Albuquerque, Rio Rancho, and Los Lunas. NFPA 72 compliant systems, inspections, and monitoring for commercial buildings.',
      keywords: 'fire alarm installation Albuquerque, NFPA 72 compliance, fire detection systems Rio Rancho, commercial fire alarms New Mexico',
      canonical: `${baseUrl}/fire-alarms`,
      schema: [getLocalBusinessSchema(), schema]
    })
  }

  /**
   * Security Alarm Service SEO
   */
  const setSecurityAlarmPageSEO = () => {
    const schema = getServiceSchema(
      'Burglar Alarm & Security System Installation',
      'Professional burglar alarm and intrusion detection system installation in Albuquerque, Rio Rancho, Placitas, and Los Lunas. 24/7 security monitoring available.',
      {
        serviceOutput: 'Security alarm system installation and monitoring',
        additionalType: 'SecuritySystemInstallation'
      }
    )

    setPageMeta({
      title: 'Burglar Alarms & Security Systems - Albuquerque',
      description: 'Expert burglar alarm installation in Albuquerque and Rio Rancho, NM. Intrusion detection systems, 24/7 monitoring, and security system service.',
      keywords: 'burglar alarm Albuquerque, security alarm installation Rio Rancho, intrusion detection New Mexico, alarm monitoring',
      canonical: `${baseUrl}/security-alarms`,
      schema: [getLocalBusinessSchema(), schema]
    })
  }

  /**
   * Access Control Service SEO
   */
  const setAccessControlPageSEO = () => {
    const schema = getServiceSchema(
      'Access Control System Installation',
      'Commercial access control systems in Albuquerque and surrounding areas. Card readers, keypads, biometric systems, and centralized access management.',
      {
        serviceOutput: 'Access control system installation',
        additionalType: 'AccessControlInstallation'
      }
    )

    setPageMeta({
      title: 'Access Control Systems - Albuquerque & Rio Rancho',
      description: 'Professional access control installation in Albuquerque, Rio Rancho, and Los Lunas. Card readers, biometric systems, and secure entry solutions.',
      keywords: 'access control Albuquerque, card reader installation Rio Rancho, keyless entry systems New Mexico, biometric access control',
      canonical: `${baseUrl}/access-control`,
      schema: [getLocalBusinessSchema(), schema]
    })
  }

  /**
   * Networking Service SEO
   */
  const setNetworkingPageSEO = () => {
    const schema = getServiceSchema(
      'Network Infrastructure & Structured Cabling',
      'Enterprise network infrastructure, structured cabling, and IT services in Albuquerque and Rio Rancho. Network design, installation, and smart hands support.',
      {
        serviceOutput: 'Network infrastructure installation',
        additionalType: 'NetworkingServices'
      }
    )

    setPageMeta({
      title: 'Network Infrastructure & Cabling - Albuquerque',
      description: 'Professional network infrastructure and structured cabling in Albuquerque, Rio Rancho, and surrounding areas. Cat6 cabling, fiber optic installation, and smart hands services.',
      keywords: 'network installation Albuquerque, structured cabling Rio Rancho, Cat6 installation, fiber optic New Mexico, smart hands services',
      canonical: `${baseUrl}/networking`,
      schema: [getLocalBusinessSchema(), schema]
    })
  }

  /**
   * Home Page SEO
   */
  const setHomePageSEO = () => {
    setPageMeta({
      title: 'Security & Low Voltage Systems - Albuquerque, NM',
      description: 'NM Technology: Professional security systems, fire alarms, CCTV cameras, access control, and network infrastructure in Albuquerque, Rio Rancho, Placitas, and Los Lunas, New Mexico.',
      keywords: 'security systems Albuquerque, low voltage contractor Rio Rancho, fire alarm installation, CCTV cameras, access control New Mexico',
      canonical: `${baseUrl}/home`,
      schema: [getLocalBusinessSchema()]
    })
  }

  return {
    businessInfo,
    getLocalBusinessSchema,
    getServiceSchema,
    setPageMeta,
    setCCTVPageSEO,
    setFireAlarmPageSEO,
    setSecurityAlarmPageSEO,
    setAccessControlPageSEO,
    setNetworkingPageSEO,
    setHomePageSEO
  }
}
