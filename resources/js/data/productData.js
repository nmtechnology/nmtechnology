// Product data with categories for CCTV page
export const cameraProducts = [
  {
    id: 'box-cam-1',
    name: 'HD Security Box Camera',
    description: 'High-definition video quality with night vision capabilities.',
    price: null, // Call for price
    image: '/public/images/axis-bullet-cam.webp',
    category: 'camera',
    brand: 'Axis Communications',
    features: ['HD Resolution', 'Night Vision', 'Motion Detection']
  },
  {
    id: 'hd-cam-1',
    name: 'HD Dome Security Camera',
    description: 'High-definition video quality with night vision capabilities.',
    price: null,
    image: '/public/images/axis-dome-side.webp',
    category: 'camera',
    brand: 'Axis Communications',
    features: ['HD Resolution', 'Night Vision', 'Weather Resistant']
  },
  {
    id: 'nvr-recorder-1',
    name: '8CH Network Recorder',
    description: 'High-definition video quality recorder with remote viewing app.',
    price: null,
    image: '/public/images/nvr-recorder.webp',
    category: 'recorder',
    brand: 'Axis Communications',
    features: ['8 Channels', 'Remote Viewing', 'Mobile App']
  },
  {
    id: 'box-cam-2',
    name: 'Advanced Security Box Camera',
    description: 'Advanced high-definition video quality with night vision and AI capabilities.',
    price: null,
    image: '/public/images/axis-bullet-cam.webp',
    category: 'camera',
    brand: 'Hikvision',
    features: ['4K Resolution', 'Night Vision', 'AI Motion Detection']
  },
  {
    id: 'hd-cam-2',
    name: 'Advanced Dome Security Camera',
    description: 'Advanced high-definition video quality with night vision and AI capabilities.',
    price: null,
    image: '/public/images/axis-dome-side.webp',
    category: 'camera',
    brand: 'Hikvision',
    features: ['4K Resolution', 'Night Vision', 'Weather Resistant']
  },
  {
    id: 'nvr-recorder-2',
    name: '16CH Network Recorder',
    description: 'Advanced high-definition video quality recorder with remote viewing app and AI features.',
    price: null,
    image: '/public/images/nvr-recorder.webp',
    category: 'recorder',
    brand: 'Hikvision',
    features: ['16 Channels', 'Remote Viewing', 'Mobile App', 'AI Detection']
  },
  {
    id: 'poe-switch-1',
    name: '8-Port PoE Switch',
    description: 'Power over Ethernet switch for connecting IP cameras.',
    price: null,
    image: '/public/images/nvr-recorder.webp', // Using placeholder image
    category: 'accessory',
    brand: 'Ubiquiti',
    features: ['8 PoE Ports', 'Managed', 'Easy Setup']
  },
  {
    id: 'wifi-bridge-1',
    name: 'LiteBeam 5AC Gen2 WiFi Bridge',
    description: 'Point-to-point wireless bridge for extending network coverage up to 5km with high-speed data transmission.',
    price: null,
    image: '/public/images/axis-dome-side.webp', // Using placeholder image
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
    name: 'G5 Pro UVC Camera',
    description: 'Next-gen indoor/outdoor 4K PoE camera with exceptional image performance, long-range IR night vision, and 3x optical zoom.',
    price: null,
    image: '/public/images/axis-bullet-cam.webp', // Using placeholder image
    category: 'camera',
    brand: 'Ubiquiti',
    features: [
      '4K Resolution', 
      '3x Optical Zoom', 
      'IR Night Vision (25m)', 
      'Smart Detection', 
      'IP65 Weatherproof',
      'Built-in Microphone',
      'NDAA Compliant'
    ],
    specs: {
      dimensions: 'Ø86 x 154.3 mm (Ø3.4 x 6.1")',
      resolution: '4K (8MP 3840 x 2160)',
      nightVision: '25m (82 ft), up to 40m (131 ft) with Vision Enhancer',
      zoom: '3x Optical',
      fov: 'Wide: H 109.9°, V 60°, D 127.7° | Zoom: H 35°, V 19.8°, D 40°',
      smartDetections: 'People, Vehicles, Animals',
      audio: 'Built-in Microphone',
      weatherproofing: 'IP65',
      tamperResistance: 'IK04',
      mountOptions: 'Wall, ceiling, pole mount (Included)',
      networkInterface: '10/100 MbE RJ45 port',
      maxFrameRate: '30 FPS',
      sensor: '1/2" 8MP',
      lens: 'F 4.1–12.3 mm; ƒ/1.53–ƒ/3.3',
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
    image: '/public/images/axis-bullet-cam.webp', // Using placeholder image
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
    image: '/public/images/nvr-recorder.webp', // Using placeholder image
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
    image: '/public/images/axis-dome-side.webp', // Using placeholder image
    category: 'accessory',
    brand: 'Axis Communications',
    features: ['Adjustable', 'Weather Resistant', 'Easy Installation']
  }
];
