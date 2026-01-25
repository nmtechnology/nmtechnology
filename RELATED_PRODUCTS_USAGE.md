# RelatedProducts Component Usage Guide

The `RelatedProducts` component displays a horizontal scrollable section of filtered products on any page.

## Features
- ✅ Horizontal scrollable product grid
- ✅ Filter by category, brand, or exclude specific products
- ✅ Themed styling (green, blue, purple, yellow, orange)
- ✅ Responsive design with touch/mouse scrolling
- ✅ Navigation arrows on hover
- ✅ "Add to Quote" functionality
- ✅ Click to view product details
- ✅ "View All" button to navigate to products page

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `category` | String/Array | null | Filter by category (camera, network, alarm, access, recorder, security, etc.) |
| `brand` | String | null | Filter by brand (Axis Communications, Hikvision, Ubiquiti, etc.) |
| `excludeIds` | Array | [] | Array of product IDs to exclude |
| `maxProducts` | Number | 12 | Maximum number of products to display |
| `title` | String | 'Related Products' | Section title |
| `subtitle` | String | 'Explore our selection of products' | Section subtitle |
| `theme` | String | 'green' | Color theme (green, blue, purple, yellow, orange, red) |
| `showViewAllButton` | Boolean | true | Show "View All" button |
| `showNavButtons` | Boolean | true | Show left/right navigation arrows |

## Product Categories

Based on the productData.js file, these categories are available:
- `camera` - Security cameras
- `recorder` - NVR/DVR systems
- `network` - Networking equipment
- `security` - Security devices
- `monitoring` - Monitoring services
- `package` - Complete security packages
- `accessory` - Accessories

## Usage Examples

### CCTV Page (Blue Theme)
```vue
<RelatedProducts
  :category="['camera', 'recorder']"
  title="CCTV Cameras & Recorders"
  subtitle="Professional surveillance equipment for your security needs"
  theme="blue"
  :max-products="8"
  @product-clicked="handleProductClick"
/>
```

### Security Alarms Page (Green Theme)
```vue
<RelatedProducts
  category="security"
  title="Security Alarm Systems"
  subtitle="Advanced alarm systems and sensors"
  theme="green"
  :max-products="8"
  @product-clicked="handleProductClick"
/>
```

### Access Control Page (Purple Theme)
```vue
<RelatedProducts
  category="access"
  title="Access Control Solutions"
  subtitle="Smart locks, keypads, and access management systems"
  theme="purple"
  :max-products="8"
  @product-clicked="handleProductClick"
/>
```

### Networking Page (Blue Theme)
```vue
<RelatedProducts
  category="network"
  title="Network Infrastructure"
  subtitle="Switches, routers, and network management solutions"
  theme="blue"
  :max-products="10"
  @product-clicked="handleProductClick"
/>
```

### Fire Alarms Page (Red Theme)
```vue
<RelatedProducts
  :category="['security', 'alarm']"
  title="Fire Detection & Alarm Systems"
  subtitle="Life-safety fire alarm and detection equipment"
  theme="red"
  :max-products="6"
  @product-clicked="handleProductClick"
/>
```

## Implementation Steps

### 1. Import the component
```vue
<script setup>
import RelatedProducts from "./RelatedProducts.vue";
// ... other imports
</script>
```

### 2. Add the component to your template
Place it where you want it to appear (usually before the CTA section):
```vue
<template>
  <main>
    <!-- Your existing content -->
    
    <!-- Add Related Products Section -->
    <RelatedProducts
      :category="['camera', 'recorder']"
      title="Related Products"
      subtitle="Explore our selection"
      theme="blue"
      @product-clicked="handleProductClick"
    />
    
    <!-- CTA Section or Footer -->
  </main>
</template>
```

### 3. Add the event handler
```vue
<script setup>
import { useRouter } from "vue-router";

const router = useRouter();

const handleProductClick = (product) => {
  // Navigate to products page with the product selected
  router.push({ 
    path: '/products',
    query: { productId: product.id }
  });
};
</script>
```

## Styling Tips

- The component uses the parent's background, so place it on a `bg-gray-900/40` or similar section
- Horizontal padding is built-in (px-6 lg:px-8)
- Vertical spacing (py-12) is included
- Cards have hover effects and smooth transitions
- Scrollbar is hidden for a cleaner look

## Complete Example (CcTv.vue - Already Implemented)

See `/resources/js/components/CcTv.vue` for a complete working example of how the component is integrated into a page.

## Next Steps

To add to other pages:
1. ✅ CcTv.vue - Already added
2. SecurityAlarms.vue - Add with `category="security"` and `theme="green"`
3. FireAlarms.vue - Add with `category="alarm"` and `theme="red"`
4. Networking.vue - Add with `category="network"` and `theme="blue"`
5. AccessControl.vue - Add with `category="access"` and `theme="purple"`
