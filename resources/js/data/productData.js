// Product data with categories for CCTV page
export const cameraProducts = [
  {
    id: 'udm-pro',
    name: 'UniFi Dream Machine Pro',
    description: 'All-in-one network security gateway and controller for enterprise-grade networks with integrated security features, advanced routing, and network management.',
    price: null, // Call for price
    image: '/images/KX-UDMPRO-dream-machine-nvr-1.png',
    images: [
      '/images/KX-UDMPRO-dream-machine-nvr-1.png',
      '/images/KX-UDMPRO-dream-machine-nvr-2.png',
      '/images/KX-UDMPRO-dream-machine-nvr-3.png',
      '/images/KX-UDMPRO-dream-machine-nvr-4.png'
    ],
    category: 'network',
    brand: 'Ubiquiti',
    features: [
      'All-in-One Network Appliance',
      'Integrated Security Gateway',
      '10 Gbps WAN/LAN SFP+ Ports',
      '8-Port Gigabit Switch',
      '3.5" HDD Bay for NVR',
      'UniFi Network Controller',
      'IDS/IPS Threat Management'
    ],
    specs: {
      dimensions: '442.4 x 43.7 x 285.6 mm (17.42 x 1.72 x 11.24")',
      processor: '1.7 GHz Quad-Core Processor',
      memory: '4 GB DDR4 RAM',
      storage: '16 GB eMMC, 3.5" HDD Bay for Protect',
      networkInterfaces: '(1) 10G WAN, (1) 10G SFP+, (8) GbE RJ45 LAN',
      maxThroughput: '10 Gbps total, 3.5 Gbps with IDS/IPS',
      management: 'UniFi OS with Network, Protect & Access Applications',
      powerInput: '100-240VAC, 50/60 Hz',
      powerConsumption: '33W (Max)',
      operating: 'UniFi OS',
      mounting: 'Standard 19" Rack Mount (1U)',
      temperature: '0 to 40°C (32 to 104°F)'
    }
  },
  {
    id: 'box-cam-1',
    name: 'HD Security Box Camera',
    description: 'High-definition video quality with night vision capabilities.',
    price: null, // Call for price
    image: '/images/axis-bullet-cam.webp',
    category: 'camera',
    brand: 'Axis Communications',
    features: ['HD Resolution', 'Night Vision', 'Motion Detection']
  },
  {
    id: 'hd-cam-1',
    name: 'HD Dome Security Camera',
    description: 'High-definition video quality with night vision capabilities.',
    price: null,
    image: '/images/axis-dome-side.webp',
    category: 'camera',
    brand: 'Axis Communications',
    features: ['HD Resolution', 'Night Vision', 'Weather Resistant']
  },
  {
    id: 'nvr-recorder-1',
    name: '8CH Network Recorder',
    description: 'High-definition video quality recorder with remote viewing app.',
    price: null,
    image: '/images/nvr-recorder.webp',
    category: 'recorder',
    brand: 'Axis Communications',
    features: ['8 Channels', 'Remote Viewing', 'Mobile App']
  },
  {
    id: 'box-cam-2',
    name: 'Advanced Security Box Camera',
    description: 'Advanced high-definition video quality with night vision and AI capabilities.',
    price: null,
    image: '/images/axis-bullet-cam.webp',
    category: 'camera',
    brand: 'Hikvision',
    features: ['4K Resolution', 'Night Vision', 'AI Motion Detection']
  },
  {
    id: 'hd-cam-2',
    name: 'Advanced Dome Security Camera',
    description: 'Advanced high-definition video quality with night vision and AI capabilities.',
    price: null,
    image: '/images/axis-dome-side.webp',
    category: 'camera',
    brand: 'Hikvision',
    features: ['4K Resolution', 'Night Vision', 'Weather Resistant']
  },
  {
    id: 'nvr-recorder-2',
    name: '16CH Network Recorder',
    description: 'Advanced high-definition video quality recorder with remote viewing app and AI features.',
    price: null,
    image: '/images/nvr-recorder.webp',
    category: 'recorder',
    brand: 'Hikvision',
    features: ['16 Channels', 'Remote Viewing', 'Mobile App', 'AI Detection']
  },
  {
    id: 'poe-switch-1',
    name: '8-Port PoE Switch',
    description: 'Power over Ethernet switch for connecting IP cameras.',
    price: null,
    image: '/images/nvr-recorder.webp', // Using placeholder image
    category: 'accessory',
    brand: 'Ubiquiti',
    features: ['8 PoE Ports', 'Managed', 'Easy Setup']
  },
  {
    id: 'wifi-bridge-1',
    name: 'LiteBeam 5AC Gen2 WiFi Bridge',
    description: 'Point-to-point wireless bridge for extending network coverage up to 5km with high-speed data transmission.',
    price: null,
    image: '/images/ubiquiti-wifi-bridge.webp', // Using placeholder image
    category: 'network',
    brand: 'Ubiquiti',
    features: [
      '867 Mbps Max Speed', 
      '5km (3.1mi) Coverage', 
      '5GHz WiFi 5', 
      'IPX6 Weatherproof', 
      '2x2 MIMO',
      'PoE Powered',
      'NDAA Compliant'
    ],
    specs: {
      dimensions: 'Ø189.5 x 64.3 mm (Ø7.4 x 2.5")',
      wifi: 'WiFi 5 (802.11ac)',
      range: '5 km (3.1 mi)',
      weatherproofing: 'IPX6',
      power: '48V, 0.32A PoE adapter (Included)',
      antenna: '19 dBi',
      maxTxPower: '25 dBm',
      interfaces: '(2) GbE RJ45 ports',
      temperature: '-40 to 60° C (-40 to 140° F)',
      frequency: '5150 - 5875 MHz',
      mountOptions: 'Wall, pole (mount included)'
    }
  },
  {
    id: 'uvc-g5-pro',
    name: 'UniFi G5 Pro Camera',
    description: 'Next-gen indoor/outdoor 4K PoE camera with exceptional image performance, long-range IR night vision, and 3x optical zoom.',
    price: null,
    image: '/images/KX-UVCG5PRO-G5-Pro-camera-1.png',
    images: [
      '/images/KX-UVCG5PRO-G5-Pro-camera-1.png',
      '/images/KX-UVCG5PRO-G5-Pro-camera-2.png',
      '/images/KX-UVCG5PRO-G5-Pro-camera-3.png',
      '/images/KX-UVCG5PRO-G5-Pro-camera-4.png',
      '/images/KX-UVCG5PRO-G5-Pro-camera-5.png'
    ],
    category: 'camera',
    brand: 'Ubiquiti',
    features: [
      '4K Resolution (8MP)', 
      '3x Optical Zoom', 
      'IR Night Vision (25m/82ft)',
      'IP65 Weatherproof',
      'H.264/H.265 Video Formats',
      'PoE Powered',
      'Wall & Pole Mountable'
    ],
    specs: {
      dimensions: '86 mm x 154.3 mm (3.4" x 6.1")',
      resolution: '4K (8MP 3840 x 2160)',
      nightVision: '25m (82 ft)',
      zoom: '3x Optical',
      fov: 'H: 35-109.9° / V: 19.8-60° / D: 40-127.7°',
      lens: 'Varifocal 4.1-12.3mm, f/1.53-f/3.3',
      weatherproofing: 'IP65',
      mountOptions: 'Wall mount, Pole mount',
      networkInterface: 'RJ-45 Ethernet with PoE',
      maxFrameRate: '30 FPS',
      sensor: 'CMOS',
      videoFormat: 'H.264, H.265',
      powerInput: '37-57V DC (PoE)',
      temperature: '-4° to 122°F (-20° to 50°C)',
      humidity: '0-90% Operating Humidity',
      power: 'PoE (37-57V DC)',
      powerConsumption: 'Device: 10W, With Enhancer: 12.95W',
      processor: 'Dual-core Arm® Cortex®-A53 based chip',
      temperature: '-20 to 50° C (-4 to 122° F)'
    }
  },
  {
    id: 'uvc-g4-pro',
    name: 'UVC G4 Pro Camera',
    description: 'Professional-grade 4K security camera with advanced motion detection and IR night vision.',
    price: null,
    image: '/images/axis-bullet-cam.webp', // Using placeholder image
    category: 'camera',
    brand: 'Ubiquiti',
    features: [
      '4K Resolution', 
      'Wide Dynamic Range', 
      'IR Night Vision (30m)', 
      'Smart Motion Detection', 
      'IP67 Weatherproof',
      'PoE Powered',
      'NDAA Compliant'
    ],
    specs: {
      dimensions: '122 x 85 x 85 mm (4.8 x 3.3 x 3.3")',
      resolution: '4K (8MP 3840 x 2160)',
      nightVision: '30m (100 ft) with IR illuminators',
      fov: '85° Horizontal, 45° Vertical',
      weatherproofing: 'IP67',
      networkInterface: '10/100/1000 Ethernet port',
      maxFrameRate: '24 FPS at 4K',
      power: 'PoE+ IEEE 802.3at',
      powerConsumption: '13W Maximum',
      temperature: '-30 to 60°C (-22 to 140°F)',
      storage: 'microSD Card Slot (Card Not Included)'
    }
  },
  {
    id: 'unvr-pro',
    name: 'UniFi Network Video Recorder Pro',
    description: 'Enterprise-grade NVR system with built-in storage for recording up to 20 cameras simultaneously.',
    price: null,
    image: '/public/images/nvr-recorder.webp', // Using placeholder image
    category: 'recorder',
    brand: 'Ubiquiti',
    features: [
      'Records up to 20 cameras', 
      '8TB Built-in Storage (expandable to 24TB)', 
      '4K Video Support', 
      'Smart Search Features', 
      'Rack Mountable',
      'Dual-Core CPU'
    ],
    specs: {
      dimensions: '484 x 305 x 44.5 mm (19.1 x 12.0 x 1.8")',
      processor: 'Quad-Core ARM Cortex-A57 at 1.7 GHz',
      memory: '4 GB DDR4',
      storage: '4x 3.5" HDD Bays (Hot-Swappable), 8TB Pre-installed',
      interfaces: '1x 10G SFP+ Port, 1x GbE RJ45 Port',
      powerInput: '100-240VAC, 50/60 Hz',
      powerConsumption: '100W Maximum',
      operating: 'UniFi Protect OS',
      mounting: 'Standard 19" Rack Mount (1U)',
      temperature: '0 to 35°C (32 to 95°F)'
    }
  },
  {
    id: 'switch-pro-24',
    name: 'UniFi Switch Pro 24 PoE',
    description: 'Advanced 24-port Gigabit PoE+ switch with SFP+ ports for high-performance network deployments.',
    price: null,
    image: '/images/nvr-recorder.webp', // Using placeholder image
    category: 'network',
    brand: 'Ubiquiti',
    features: [
      '(24) GbE RJ45 Ports with PoE+', 
      '(2) 10G SFP+ Ports', 
      'Layer 3 Switching', 
      'Total PoE Budget: 400W', 
      '1.3" Color Touchscreen',
      'Silent Operation'
    ],
    specs: {
      dimensions: '485 x 442 x 43.7 mm (19.1 x 17.4 x 1.72")',
      totalPorts: '26 (24 GbE RJ45 + 2 SFP+)',
      switching: 'Non-Blocking 128 Gbps',
      forwarding: '95.24 Mpps',
      poeInterfaces: 'IEEE 802.3at (PoE+)',
      poeBudget: '400W',
      maxPoePerPort: '30W',
      powerInput: '100-240VAC, 50/60 Hz',
      powerConsumption: '500W Maximum',
      mounting: 'Rack Mount, 1U Height',
      management: 'UniFi Network Application'
    }
  },
  {
    id: 'camera-mount-1',
    name: 'Security Camera Mount',
    description: 'Adjustable mount for security cameras.',
    price: null,
    image: '/images/axis-dome-side.webp', // Using placeholder image
    category: 'accessory',
    brand: 'Axis Communications',
    features: ['Adjustable', 'Weather Resistant', 'Easy Installation']
  },
  {
    id: 'u6-pro-us',
    name: 'Ubiquiti UniFi WiFi 6 Pro Access Point',
    description: 'Quickly expand your business\'s network with strong and reliable wireless coverage by connecting the WiFi 6 Pro Dual-Band Access Point from Ubiquiti Networks to your compatible router or network switch. Supporting over 300 concurrent connections with 4x4 MIMO with 160 MHz channels.',
    price: null, // Call for price
    image: '/images/KX-U6PRO-access-point-angle-1.png',
    images: [
      '/images/KX-U6PRO-access-point-angle-1.png',
      '/images/KX-U6PRO-access-point-angle-2.png',
      '/images/KX-U6PRO-access-point-angle-3.png'
    ],
    category: 'network',
    brand: 'Ubiquiti',
    features: [
      'WiFi 6 (802.11ax) Technology',
      '5.3 Gbps Total Throughput',
      '4x4 MIMO with 160 MHz Channels',
      'Supports 300+ Concurrent Connections',
      'Dual-Band 2.4 GHz and 5 GHz',
      'PoE+ Powered',
      'IP54 Weatherproof Rating',
      'Easy UniFi Network Management'
    ],
    specs: {
      dimensions: '197.7 mm diameter x 35.8 mm height (7.8" x 1.4")',
      processor: 'Quad-Core ARM Processor',
      networkInterfaces: '(1) GbE RJ45 Port with PoE+',
      wifi: 'Dual-Band 802.11ax',
      maxThroughput: '5.3 Gbps',
      frequency: '2.4 GHz & 5 GHz',
      encryption: 'WPA, WPA2, WPA3, WPA-ENT, WPA-PSK',
      powerInput: 'PoE+ IEEE 802.3at',
      powerConsumption: '13W Maximum',
      mountOptions: 'Ceiling Mount, Wall Mount (Included)',
      management: 'UniFi Network Application',
      temperature: 'Indoor Use',
      antennaType: 'Internal 4x4 MIMO'
    }
  },
  
  // CCTV Security Packages - Tiered solutions for different security needs
  {
    id: 'patriot-package',
    name: 'Patriot Package',
    description: 'Entry-level security package with 4 cameras. Perfect for small homes and offices.',
    price: 699.99,
    image: '/images/axis-dome-side.webp', // Using placeholder image
    category: 'package',
    brand: 'NM Security Packages',
    features: [
      '4 HD Cameras (2MP Resolution)',
      '4-Channel NVR',
      '4TB Storage Capacity',
      'Night Vision',
      'Motion Detection',
      'Mobile App Access'
    ],
    specs: {
      cameraCount: 4,
      resolution: '1080p (2MP)',
      nvr: '4-Channel',
      storage: '4TB HDD',
      poe: 'Built-in PoE',
      coverage: 'Small property (up to 1,500 sq ft)',
      warranty: '1 Year Standard'
    }
  },
  {
    id: 'guardian-package',
    name: 'Guardian Package',
    description: 'Step up your security with enhanced resolution and more storage capacity.',
    price: 999.99,
    image: '/images/axis-bullet-cam.webp', // Using placeholder image
    category: 'package',
    brand: 'NM Security Packages',
    features: [
      '4 Ultra HD Cameras (4MP Resolution)',
      '8-Channel NVR',
      '6TB Storage Capacity',
      'Enhanced Night Vision',
      'Smart Motion Detection',
      'Mobile App & Desktop Access'
    ],
    specs: {
      cameraCount: 4,
      resolution: '2K (4MP)',
      nvr: '8-Channel',
      storage: '6TB HDD',
      poe: 'Built-in PoE',
      coverage: 'Medium property (up to 2,500 sq ft)',
      warranty: '2 Year Standard'
    }
  },
  {
    id: 'sentinel-package',
    name: 'Sentinel Package',
    description: 'Comprehensive security solution with more cameras and advanced features.',
    price: 1499.99,
    image: '/images/cctv-outdoor-wall.webp', // Using placeholder image
    category: 'package',
    brand: 'NM Security Packages',
    features: [
      '6 Ultra HD Cameras (4MP Resolution)',
      '8-Channel NVR',
      '8TB Storage Capacity',
      'Advanced Night Vision (Up to 100ft)',
      'Person & Vehicle Detection',
      'Two-Way Audio',
      'Weather Resistant (IP66)'
    ],
    specs: {
      cameraCount: 6,
      resolution: '2K (4MP)',
      nvr: '8-Channel',
      storage: '8TB HDD',
      poe: 'Built-in PoE+',
      coverage: 'Medium to Large property (up to 3,500 sq ft)',
      warranty: '2 Year Standard'
    }
  },
  {
    id: 'defender-package',
    name: 'Defender Package',
    description: 'Superior protection with high-resolution cameras and expanded coverage.',
    price: 1999.99,
    image: '/images/cctv-corner.webp', // Using placeholder image
    category: 'package',
    brand: 'NM Security Packages',
    features: [
      '8 4K Ultra HD Cameras (8MP Resolution)',
      '16-Channel NVR',
      '12TB Storage Capacity',
      'Advanced Night Vision (Up to 130ft)',
      'AI-Powered Motion Detection',
      'Cloud Backup Option',
      'Weather Resistant (IP67)'
    ],
    specs: {
      cameraCount: 8,
      resolution: '4K (8MP)',
      nvr: '16-Channel',
      storage: '12TB HDD',
      poe: 'Built-in PoE+ with Extended Range',
      coverage: 'Large property (up to 5,000 sq ft)',
      warranty: '3 Year Premium'
    }
  },
  {
    id: 'fortress-package',
    name: 'Fortress Package',
    description: 'Professional-grade security system for large properties with comprehensive coverage.',
    price: 2999.99,
    image: '/images/cctv-highway.webp', // Using placeholder image
    category: 'package',
    brand: 'NM Security Packages',
    features: [
      '12 4K Ultra HD Cameras (8MP Resolution)',
      '16-Channel NVR',
      '16TB Storage Capacity',
      'Color Night Vision',
      'Advanced AI Analytics',
      'Perimeter Intrusion Detection',
      'Weatherproof (IP67) & Vandal-resistant'
    ],
    specs: {
      cameraCount: 12,
      resolution: '4K (8MP)',
      nvr: '16-Channel',
      storage: '16TB RAID Storage',
      poe: 'Enterprise PoE+ Network',
      coverage: 'Large property (up to 8,000 sq ft)',
      warranty: '3 Year Premium with On-Site Service'
    }
  },
  {
    id: 'sovereign-package',
    name: 'Sovereign Package',
    description: 'Our most advanced security solution with state-of-the-art technology for maximum security.',
    price: 4499.99,
    image: '/images/cctv-mkII.webp', // Using placeholder image
    category: 'package',
    brand: 'NM Security Packages',
    features: [
      '16 4K Ultra HD Cameras (Mix of Dome, Bullet & PTZ)',
      '32-Channel NVR',
      '24TB RAID Storage',
      'Starlight Night Vision Technology',
      'Advanced Analytics (Face Detection, License Plate Recognition)',
      'Integrated Alarm System',
      'Remote Management & Monitoring'
    ],
    specs: {
      cameraCount: 16,
      resolution: '4K+ (8MP+)',
      nvr: '32-Channel Enterprise Grade',
      storage: '24TB RAID Storage with Hot-Swap',
      poe: 'Enterprise PoE++ with Redundancy',
      coverage: 'Estate or Commercial (10,000+ sq ft)',
      warranty: '5 Year Premium with 24/7 Support'
    }
  },
  {
    id: 'presidential-package',
    name: 'Presidential Package',
    description: 'Ultimate security solution for estates and businesses requiring the highest level of protection.',
    price: 7999.99,
    image: '/images/cctv-highway.webp', // Using placeholder image
    category: 'package',
    brand: 'NM Security Packages',
    features: [
      '24+ Custom Security Camera Mix (4K & 12MP)',
      'Fully Customizable Camera Placement',
      '64-Channel Enterprise NVR',
      '36TB Redundant Storage with Cloud Backup',
      'Advanced AI with Behavioral Analysis',
      'Thermal & Optical Cameras Option',
      'Integration with Smart Home/Business Systems',
      'Dedicated Security Monitoring Station'
    ],
    specs: {
      cameraCount: '24+ (Customizable)',
      resolution: 'Up to 12MP',
      nvr: '64-Channel Enterprise Grade with Failover',
      storage: '36TB Redundant RAID with Cloud Backup',
      poe: 'Enterprise Grade Network with UPS Backup',
      coverage: 'Large Estate or Business Campus (Unlimited)',
      warranty: 'Lifetime Premium with Dedicated Support Team'
    }
  },
  
  // Security Monitoring Packages - Monthly subscription security monitoring
  {
    id: 'essential-monitoring',
    name: 'Essential Monitoring',
    description: 'Basic home security monitoring package for apartment or small homes with 24/7 professional monitoring.',
    price: 39.99, // Monthly price
    image: '/images/security-monitoring-basic.webp', // Using placeholder image
    category: 'monitoring',
    brand: 'NM Security Monitoring',
    recurring: true,
    billingCycle: 'monthly',
    features: [
      '24/7 Professional Monitoring',
      '2 Door Contacts',
      '4 Window Sensors',
      '2 PIR Motion Detectors',
      'Mobile App Access',
      'Push Notifications',
      'Email Alerts'
    ],
    specs: {
      doorContacts: 2,
      windowSensors: 4,
      motionDetectors: 2,
      ipSirens: 0,
      smartDevices: 0,
      responseTimes: 'Under 60 seconds',
      contractLength: 'Month-to-month',
      installation: 'Professional installation available ($99)',
      monthlyFee: '$39.99/month',
      idealFor: 'Apartments, Condos, Small Homes (up to 1,000 sq ft)'
    },
    savings: {
      yearOne: 120,
      yearThree: 480,
      yearFive: 840
    }
  },
  {
    id: 'standard-monitoring',
    name: 'Standard Monitoring',
    description: 'Enhanced home security coverage with added sensors and smart device integration for medium-sized homes.',
    price: 49.99,
    image: '/images/security-monitoring-standard.webp', // Using placeholder image
    category: 'monitoring',
    brand: 'NM Security Monitoring',
    recurring: true,
    billingCycle: 'monthly',
    features: [
      '24/7 Professional Monitoring',
      '4 Door Contacts',
      '6 Window Sensors',
      '3 PIR Motion Detectors',
      '1 IP Siren',
      'Mobile App Access',
      'Smart Home Integration (1 device)',
      'SMS & Push Notifications',
      'Email Alerts'
    ],
    specs: {
      doorContacts: 4,
      windowSensors: 6,
      motionDetectors: 3,
      ipSirens: 1,
      smartDevices: 1,
      responseTimes: 'Under 45 seconds',
      contractLength: 'Month-to-month',
      installation: 'Professional installation included',
      monthlyFee: '$49.99/month',
      idealFor: 'Medium-sized Homes (up to 2,000 sq ft)'
    },
    savings: {
      yearOne: 180,
      yearThree: 660,
      yearFive: 1140
    }
  },
  {
    id: 'premium-monitoring',
    name: 'Premium Monitoring',
    description: 'Comprehensive security solution with advanced smart home features and expanded coverage for larger homes.',
    price: 59.99,
    image: '/images/security-monitoring-premium.webp', // Using placeholder image
    category: 'monitoring',
    brand: 'NM Security Monitoring',
    recurring: true,
    billingCycle: 'monthly',
    features: [
      '24/7 Professional Monitoring',
      '6 Door Contacts',
      '8 Window Sensors',
      '4 PIR Motion Detectors',
      '1 IP Siren',
      'Mobile App Access with Live Video',
      'Smart Home Integration (2 devices)',
      'SMS & Push Notifications',
      'Email Alerts',
      'Weekly Security Reports'
    ],
    specs: {
      doorContacts: 6,
      windowSensors: 8,
      motionDetectors: 4,
      ipSirens: 1,
      smartDevices: 2,
      responseTimes: 'Under 30 seconds',
      contractLength: 'Month-to-month',
      installation: 'Professional installation included',
      monthlyFee: '$59.99/month',
      idealFor: 'Larger Homes (up to 3,000 sq ft)'
    },
    savings: {
      yearOne: 240,
      yearThree: 840,
      yearFive: 1440
    }
  },
  {
    id: 'advanced-monitoring',
    name: 'Advanced Monitoring',
    description: 'Advanced security monitoring with extensive coverage, glass break detection and smart automation features.',
    price: 69.99,
    image: '/images/security-monitoring-advanced.webp', // Using placeholder image
    category: 'monitoring',
    brand: 'NM Security Monitoring',
    recurring: true,
    billingCycle: 'monthly',
    features: [
      '24/7 Professional Monitoring',
      '8 Door Contacts',
      '10 Window Sensors',
      '5 PIR Motion Detectors',
      '2 IP Sirens',
      'Glass Break Detection',
      'Mobile App Access with Live Video',
      'Smart Home Integration (3 devices)',
      'SMS & Push Notifications',
      'Email Alerts',
      'Weekly Security Reports',
      'Guard Dispatch Service'
    ],
    specs: {
      doorContacts: 8,
      windowSensors: 10,
      motionDetectors: 5,
      ipSirens: 2,
      smartDevices: 3,
      responseTimes: 'Under 25 seconds',
      contractLength: 'Month-to-month',
      installation: 'Professional installation included + system setup',
      monthlyFee: '$69.99/month',
      idealFor: 'Large Homes (up to 4,000 sq ft)'
    },
    savings: {
      yearOne: 360,
      yearThree: 1080,
      yearFive: 1800
    }
  },
  {
    id: 'elite-monitoring',
    name: 'Elite Monitoring',
    description: 'Elite-level security coverage with complete home automation integration and priority response for large homes.',
    price: 89.99,
    image: '/images/security-monitoring-elite.webp', // Using placeholder image
    category: 'monitoring',
    brand: 'NM Security Monitoring',
    recurring: true,
    billingCycle: 'monthly',
    features: [
      '24/7 Professional Monitoring with Priority Response',
      '10 Door Contacts',
      '12 Window Sensors',
      '6 PIR Motion Detectors',
      '2 IP Sirens',
      'Glass Break Detection',
      'Water Leak Detection',
      'Carbon Monoxide Monitoring',
      'Mobile App Access with Live Video',
      'Smart Home Integration (5 devices)',
      'Complete Home Automation',
      'SMS & Push Notifications',
      'Email Alerts',
      'Daily Security Reports',
      'Guard Dispatch Service',
      'Video Verification'
    ],
    specs: {
      doorContacts: 10,
      windowSensors: 12,
      motionDetectors: 6,
      ipSirens: 2,
      smartDevices: 5,
      responseTimes: 'Under 20 seconds',
      contractLength: 'Month-to-month',
      installation: 'Premium installation included + system setup',
      monthlyFee: '$89.99/month',
      idealFor: 'Large Homes & Estates (up to 6,000 sq ft)'
    },
    savings: {
      yearOne: 480,
      yearThree: 1440,
      yearFive: 2400
    }
  },
  {
    id: 'ultimate-monitoring',
    name: 'Ultimate Monitoring',
    description: 'The ultimate in home security and automation with complete coverage, video surveillance, and concierge service.',
    price: 119.99,
    image: '/images/security-monitoring-ultimate.webp', // Using placeholder image
    category: 'monitoring',
    brand: 'NM Security Monitoring',
    recurring: true,
    billingCycle: 'monthly',
    features: [
      '24/7 Professional Monitoring with VIP Response',
      '12+ Door Contacts',
      '15+ Window Sensors',
      '8+ PIR Motion Detectors',
      '3 IP Sirens',
      'Glass Break Detection',
      'Water Leak Detection',
      'Smoke & Carbon Monoxide Monitoring',
      'Mobile App Access with Live Video',
      'Smart Home Integration (Unlimited devices)',
      'Complete Home Automation',
      'SMS & Push Notifications',
      'Email Alerts',
      'Daily Security Reports & Analysis',
      'Guard Dispatch Service',
      'Video Verification',
      'Dedicated Account Manager',
      'Annual Security Audit',
      'Concierge Service'
    ],
    specs: {
      doorContacts: '12+',
      windowSensors: '15+',
      motionDetectors: '8+',
      ipSirens: 3,
      smartDevices: 'Unlimited',
      responseTimes: 'Under 15 seconds',
      contractLength: 'Month-to-month',
      installation: 'Premium installation with custom setup',
      monthlyFee: '$119.99/month',
      idealFor: 'Luxury Homes & Estates (6,000+ sq ft)'
    },
    savings: {
      yearOne: 600,
      yearThree: 1800,
      yearFive: 3000
    }
  }
];
