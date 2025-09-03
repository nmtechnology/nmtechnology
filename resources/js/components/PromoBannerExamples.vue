<template>
  <div class="p-8 max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold mb-8 text-center">PromoBanner Component Examples</h1>
    
    <section class="mb-12 border-b pb-8">
      <h2 class="text-2xl font-semibold mb-6">Component Documentation</h2>
      
      <div class="bg-gray-50 p-6 rounded-lg">
        <h3 class="text-xl font-medium mb-4">Props</h3>
        <table class="w-full border-collapse">
          <thead>
            <tr class="border-b">
              <th class="text-left py-2">Prop Name</th>
              <th class="text-left py-2">Type</th>
              <th class="text-left py-2">Default</th>
              <th class="text-left py-2">Description</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b">
              <td class="py-2 font-mono">imageUrl</td>
              <td class="py-2">String</td>
              <td class="py-2">/images/halloween-promo-banner.png</td>
              <td class="py-2">URL to the banner image</td>
            </tr>
            <tr class="border-b">
              <td class="py-2 font-mono">altText</td>
              <td class="py-2">String</td>
              <td class="py-2">'Halloween Promotion Banner'</td>
              <td class="py-2">Alt text for the banner image</td>
            </tr>
            <tr class="border-b">
              <td class="py-2 font-mono">height</td>
              <td class="py-2">Number</td>
              <td class="py-2">null</td>
              <td class="py-2">Fixed height for the banner in pixels</td>
            </tr>
            <tr class="border-b">
              <td class="py-2 font-mono">maxHeight</td>
              <td class="py-2">Number</td>
              <td class="py-2">200</td>
              <td class="py-2">Maximum height for the banner in pixels</td>
            </tr>
            <tr class="border-b">
              <td class="py-2 font-mono">link</td>
              <td class="py-2">String</td>
              <td class="py-2">''</td>
              <td class="py-2">URL the banner links to when clicked</td>
            </tr>
            <tr class="border-b">
              <td class="py-2 font-mono">dismissible</td>
              <td class="py-2">Boolean</td>
              <td class="py-2">false</td>
              <td class="py-2">Whether the banner can be dismissed</td>
            </tr>
            <tr class="border-b">
              <td class="py-2 font-mono">fixed</td>
              <td class="py-2">Boolean</td>
              <td class="py-2">false</td>
              <td class="py-2">Whether the banner is fixed at the top of the viewport</td>
            </tr>
            <tr class="border-b">
              <td class="py-2 font-mono">fullWidth</td>
              <td class="py-2">Boolean</td>
              <td class="py-2">true</td>
              <td class="py-2">Whether the banner stretches to full width or uses max-width container</td>
            </tr>
            <tr class="border-b">
              <td class="py-2 font-mono">startDate</td>
              <td class="py-2">Date/String</td>
              <td class="py-2">null</td>
              <td class="py-2">Date from which the banner should be displayed</td>
            </tr>
            <tr class="border-b">
              <td class="py-2 font-mono">endDate</td>
              <td class="py-2">Date/String</td>
              <td class="py-2">null</td>
              <td class="py-2">Date until which the banner should be displayed</td>
            </tr>
            <tr class="border-b">
              <td class="py-2 font-mono">storageKey</td>
              <td class="py-2">String</td>
              <td class="py-2">'promoBannerDismissed'</td>
              <td class="py-2">localStorage key for remembering dismissal</td>
            </tr>
            <tr>
              <td class="py-2 font-mono">forceShow</td>
              <td class="py-2">Boolean</td>
              <td class="py-2">false</td>
              <td class="py-2">Force show the banner even if previously dismissed</td>
            </tr>
          </tbody>
        </table>
        
        <h3 class="text-xl font-medium mt-8 mb-4">Events</h3>
        <table class="w-full border-collapse">
          <thead>
            <tr class="border-b">
              <th class="text-left py-2">Event Name</th>
              <th class="text-left py-2">Description</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b">
              <td class="py-2 font-mono">dismissed</td>
              <td class="py-2">Emitted when the banner is dismissed by the user</td>
            </tr>
            <tr>
              <td class="py-2 font-mono">displayed</td>
              <td class="py-2">Emitted when the banner is displayed</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
    
    <!-- Examples Section -->
    <section class="mb-12">
      <h2 class="text-2xl font-semibold mb-8">Examples</h2>
      
      <!-- Basic Usage -->
      <div class="mb-12 border-b pb-8">
        <h3 class="text-xl font-bold mb-4">Basic Banner</h3>
        <p class="mb-4 text-gray-700">Default implementation with no custom properties</p>
        
        <div class="mb-6 border border-gray-300 rounded-lg overflow-hidden">
          <PromoBanner />
        </div>
        
        <div class="bg-gray-50 p-4 rounded-lg">
          <pre class="text-sm overflow-x-auto">
&lt;PromoBanner /&gt;
          </pre>
        </div>
      </div>
      
      <!-- Banner with Custom Height -->
      <div class="mb-12 border-b pb-8">
        <h3 class="text-xl font-bold mb-4">Custom Height Banner</h3>
        <p class="mb-4 text-gray-700">Setting a specific height for the banner</p>
        
        <div class="mb-6 border border-gray-300 rounded-lg overflow-hidden">
          <PromoBanner :height="120" />
        </div>
        
        <div class="bg-gray-50 p-4 rounded-lg">
          <pre class="text-sm overflow-x-auto">
&lt;PromoBanner :height="120" /&gt;
          </pre>
        </div>
      </div>
      
      <!-- Banner with Custom Link -->
      <div class="mb-12 border-b pb-8">
        <h3 class="text-xl font-bold mb-4">Banner with Link</h3>
        <p class="mb-4 text-gray-700">Making the entire banner clickable and link to a URL</p>
        
        <div class="mb-6 border border-gray-300 rounded-lg overflow-hidden">
          <PromoBanner link="/halloween-special" linkAriaLabel="View our Halloween special offers" />
        </div>
        
        <div class="bg-gray-50 p-4 rounded-lg">
          <pre class="text-sm overflow-x-auto">
&lt;PromoBanner 
  link="/halloween-special" 
  linkAriaLabel="View our Halloween special offers" 
/&gt;
          </pre>
        </div>
      </div>
      
      <!-- Dismissible Banner -->
      <div class="mb-12 border-b pb-8">
        <h3 class="text-xl font-bold mb-4">Dismissible Banner</h3>
        <p class="mb-4 text-gray-700">Banner with a close button that saves dismissal to localStorage</p>
        
        <div class="mb-6 border border-gray-300 rounded-lg overflow-hidden">
          <PromoBanner 
            dismissible 
            storageKey="exampleBannerDismissed" 
            @dismissed="onDismiss" 
          />
        </div>
        
        <div class="bg-gray-50 p-4 rounded-lg">
          <pre class="text-sm overflow-x-auto">
&lt;PromoBanner 
  dismissible 
  storageKey="exampleBannerDismissed" 
  @dismissed="onDismiss" 
/&gt;

&lt;script setup&gt;
const onDismiss = () => {
  console.log('Banner dismissed!');
};
&lt;/script&gt;
          </pre>
        </div>
      </div>
      
      <!-- Banner with Custom Content Overlay -->
      <div class="mb-12 border-b pb-8">
        <h3 class="text-xl font-bold mb-4">Banner with Custom Content</h3>
        <p class="mb-4 text-gray-700">Using slot content to overlay custom elements on the banner</p>
        
        <div class="mb-6 border border-gray-300 rounded-lg overflow-hidden">
          <PromoBanner :maxHeight="150">
            <div class="bg-black bg-opacity-50 p-4 rounded-lg text-center">
              <h3 class="text-2xl font-bold text-orange-500">Halloween Special Offer!</h3>
              <p class="text-white">Get 10% off all security systems until October 31st</p>
              <button class="mt-2 bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600">
                Learn More
              </button>
            </div>
          </PromoBanner>
        </div>
        
        <div class="bg-gray-50 p-4 rounded-lg">
          <pre class="text-sm overflow-x-auto">
&lt;PromoBanner :maxHeight="150"&gt;
  &lt;div class="bg-black bg-opacity-50 p-4 rounded-lg text-center"&gt;
    &lt;h3 class="text-2xl font-bold text-orange-500"&gt;Halloween Special Offer!&lt;/h3&gt;
    &lt;p class="text-white"&gt;Get 10% off all security systems until October 31st&lt;/p&gt;
    &lt;button class="mt-2 bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600"&gt;
      Learn More
    &lt;/button&gt;
  &lt;/div&gt;
&lt;/PromoBanner&gt;
          </pre>
        </div>
      </div>
      
      <!-- Date-based Banner -->
      <div class="mb-12 border-b pb-8">
        <h3 class="text-xl font-bold mb-4">Date-based Banner</h3>
        <p class="mb-4 text-gray-700">Banner that only appears between specific dates</p>
        
        <div class="mb-6 border border-gray-300 rounded-lg overflow-hidden">
          <p class="p-4 bg-gray-200 text-gray-600 text-center">
            This example would show a banner that's only visible from October 1 to October 31, 2023
          </p>
        </div>
        
        <div class="bg-gray-50 p-4 rounded-lg">
          <pre class="text-sm overflow-x-auto">
&lt;PromoBanner 
  startDate="2023-10-01" 
  endDate="2023-10-31" 
/&gt;
          </pre>
        </div>
      </div>
      
      <!-- Fixed Position Banner -->
      <div class="mb-12">
        <h3 class="text-xl font-bold mb-4">Fixed Position Banner</h3>
        <p class="mb-4 text-gray-700">Banner that sticks to the top of the viewport</p>
        
        <div class="mb-6 border border-gray-300 rounded-lg overflow-hidden">
          <p class="p-4 bg-gray-200 text-gray-600 text-center">
            A fixed banner would be attached to the top of the viewport and scroll with the page
          </p>
        </div>
        
        <div class="bg-gray-50 p-4 rounded-lg">
          <pre class="text-sm overflow-x-auto">
&lt;PromoBanner 
  fixed 
  :maxHeight="80" 
/&gt;
          </pre>
        </div>
        
        <button 
          @click="showFixedBanner = !showFixedBanner" 
          class="mt-4 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg"
        >
          {{ showFixedBanner ? 'Hide' : 'Show' }} Fixed Banner Example
        </button>
        
        <PromoBanner 
          v-if="showFixedBanner"
          fixed 
          :maxHeight="80" 
          dismissible
          @dismissed="showFixedBanner = false"
        >
          <div class="bg-black bg-opacity-50 flex items-center justify-center h-full">
            <p class="text-white text-center">
              This is a fixed banner that stays at the top of the viewport.<br>
              <span class="text-sm">(Click the X to dismiss)</span>
            </p>
          </div>
        </PromoBanner>
      </div>
    </section>
    
    <!-- Implementation Guide -->
    <section class="mb-12">
      <h2 class="text-2xl font-semibold mb-6">Implementation Guide</h2>
      
      <div class="bg-gray-50 p-6 rounded-lg">
        <h3 class="text-xl font-medium mb-4">Steps to add a PromoBanner to your page:</h3>
        
        <ol class="list-decimal pl-6 space-y-4">
          <li>
            <p class="font-medium">Import the component</p>
            <pre class="bg-gray-100 p-3 mt-2 rounded">import PromoBanner from '@/components/PromoBanner.vue';</pre>
          </li>
          <li>
            <p class="font-medium">Register it in your component</p>
            <pre class="bg-gray-100 p-3 mt-2 rounded">
// Option API
components: {
  PromoBanner
}

// Or with Composition API + script setup
// No registration needed when using script setup
            </pre>
          </li>
          <li>
            <p class="font-medium">Add it to your template</p>
            <pre class="bg-gray-100 p-3 mt-2 rounded">
&lt;template&gt;
  &lt;PromoBanner 
    imageUrl="/images/your-banner-image.jpg"
    :maxHeight="120"
    link="/your-promo-page"
    dismissible
  &gt;
    &lt;!-- Optional custom content --&gt;
    &lt;div class="bg-black bg-opacity-40 flex items-center justify-center"&gt;
      &lt;h3 class="text-2xl font-bold text-white"&gt;Your Promotional Message&lt;/h3&gt;
    &lt;/div&gt;
  &lt;/PromoBanner&gt;
  
  &lt;!-- Rest of your page content --&gt;
&lt;/template&gt;
            </pre>
          </li>
        </ol>
      </div>
    </section>
    
    <!-- Best Practices -->
    <section>
      <h2 class="text-2xl font-semibold mb-6">Best Practices</h2>
      
      <div class="bg-gray-50 p-6 rounded-lg">
        <ul class="list-disc pl-6 space-y-3">
          <li>Keep banners visually appealing but not too intrusive</li>
          <li>For promotional banners, always include a way for users to dismiss them</li>
          <li>Optimize your banner images for fast loading (recommended max size: 200KB)</li>
          <li>Use the date range feature for time-sensitive promotions</li>
          <li>Ensure text overlays have sufficient contrast with the background image</li>
          <li>For fixed banners, keep the height small to minimize screen space usage</li>
          <li>Test banners on multiple device sizes to ensure responsive behavior</li>
        </ul>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import PromoBanner from './PromoBanner.vue';

const showFixedBanner = ref(false);

const onDismiss = () => {
  console.log('Banner dismissed!');
};
</script>

<style scoped>
pre {
  white-space: pre-wrap;
  word-wrap: break-word;
}
</style>
