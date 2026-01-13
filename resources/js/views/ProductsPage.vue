<template>
  <!-- Halloween Promotional Banner at the top -->
  <PromoBanner
    :maxHeight="80"
    link="/halloween-special"
    fixed
    dismissible
    linkAriaLabel="View our Halloween security system special offers"
    @dismissed="handleBannerDismiss"
  >
    <div
      class="absolute inset-0 bg-black bg-opacity-90 md:flex items-center justify-center hidden"
    >
      <div class="text-center">
        <h3 class="text-xl md:text-5xl font-bold text-orange-500">
          Halloween Security Special!
        </h3>
        <p class="text-white text-lg md:text-lg">
          Get 10% off all security systems until October 31st
        </p>
      </div>
    </div>
  </PromoBanner>

  <!-- Background Pattern - Lower z-index -->

  <main
    class="pt-[60px] pb-[180px] flex-grow relative z-20 bg-gradient-to-b from-black via-gray-900 to-gray-900"
  >
    <!-- Decorative Background Blurs -->
    <div
      class="absolute top-0 left-1/4 w-[600px] h-[600px] bg-gradient-to-br from-green-500/10 to-lime-500/5 rounded-full blur-3xl -z-10"
      aria-hidden="true"
    ></div>
    <div
      class="absolute bottom-1/4 right-1/4 w-[500px] h-[500px] bg-gradient-to-tl from-lime-500/10 to-green-500/10 rounded-full blur-3xl -z-10"
      aria-hidden="true"
    ></div>

    <div class="relative">
      <div class="mx-auto max-w-7xl px-6 pb-16 pt-12 sm:pt-16 lg:px-8 lg:pt-20">
        <!-- Badge -->
        <div class="flex justify-center mb-6">
          <div
            class="inline-flex items-center gap-2 px-4 py-2 bg-green-500/10 border border-green-500/20 rounded-full backdrop-blur-sm"
          >
            <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
              <path
                fill-rule="evenodd"
                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                clip-rule="evenodd"
              />
            </svg>
            <span class="text-sm font-semibold text-green-400"
              >Advanced Security Solutions</span
            >
          </div>
        </div>

        <h1 class="text-4xl sm:text-5xl font-extrabold text-center mb-8 relative z-20">
          <span v-if="activeCategory === 'package'">
            <span class="text-white">Complete </span>
            <span
              class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400"
              >Security Packages</span
            >
          </span>
          <span v-else>
            <span class="text-white">Intelligent </span>
            <span
              class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400"
              >CCTV</span
            >
            <span class="text-white"> Security & Networking Products</span>
          </span>
        </h1>
        <p
          class="text-gray-300 text-lg mb-10 text-center relative animate-fadeIn max-w-4xl mx-auto leading-relaxed"
        >
          <span v-if="activeCategory === 'package'">
            Protect your property with NM Technology's all-in-one security packages. Our
            expert team designs, installs, and supports systems for homes, businesses, and
            franchises across New Mexico.
          </span>
          <span v-else>
            Discover the latest in smart surveillance. Our CCTV solutions help you
            monitor, deter, and respond to threats—giving you peace of mind and actionable
            insights, 24/7.
          </span>
        </p>

        <!-- Product Filter -->
        <div id="product-section" class="relative z-20">
          <ProductFilter
            :initialCategory="activeCategory"
            @filter-change="filterProducts"
          />
        </div>

        <!-- Special Package Info Box -->
        <div
          v-if="activeCategory === 'package'"
          id="package-section"
          class="bg-gradient-to-br from-gray-800 to-gray-900 backdrop-blur-md border border-green-500/30 rounded-2xl p-6 mb-8 shadow-xl ring-1 ring-green-500/20"
        >
          <div class="flex flex-col md:flex-row items-center gap-4">
            <div class="flex-1">
              <h3
                class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400 text-xl font-bold mb-3"
              >
                Complete Security Solutions
              </h3>
              <p class="text-gray-300 text-sm leading-relaxed">
                Our security packages are designed to provide complete coverage for
                properties of all sizes. Each package includes cameras, recording
                equipment, storage, and all necessary accessories. As you move up in
                tiers, you'll get higher resolution, more storage, and additional advanced
                features.
              </p>
            </div>
            <div class="flex-shrink-0">
              <button
                @click="showPackageComparison = !showPackageComparison"
                class="bg-gradient-to-r from-green-600 to-green-500 hover:from-green-500 hover:to-green-400 text-white px-5 py-3 rounded-lg flex items-center gap-2 shadow-lg shadow-green-500/30 transition-all duration-300 transform hover:scale-105 font-semibold"
              >
                <span>Compare All Packages</span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-5 w-5 transition-transform duration-300"
                  :class="{ 'rotate-180': showPackageComparison }"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M19 9l-7 7-7-7"
                  />
                </svg>
              </button>
            </div>
          </div>

          <!-- Package Comparison Table -->
          <transition name="slide">
            <div v-if="showPackageComparison" class="mt-4 overflow-x-auto">
              <table class="w-full text-left text-sm">
                <thead class="bg-gray-800/50">
                  <tr>
                    <th class="px-4 py-2 text-gray-400">Package</th>
                    <th class="px-4 py-2 text-gray-400">Cameras</th>
                    <th class="px-4 py-2 text-gray-400">Resolution</th>
                    <th class="px-4 py-2 text-gray-400">Storage</th>
                    <th class="px-4 py-2 text-gray-400">Price</th>
                    <th class="px-4 py-2 text-gray-400"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="product in packageProducts"
                    :key="product.id"
                    class="border-b border-gray-800 hover:bg-gray-800/30 transition-colors"
                  >
                    <td class="px-4 py-3 text-white font-medium">{{ product.name }}</td>
                    <td class="px-4 py-3 text-gray-300">
                      {{ product.specs?.cameraCount }}
                    </td>
                    <td class="px-4 py-3 text-gray-300">
                      {{ product.specs?.resolution }}
                    </td>
                    <td class="px-4 py-3 text-gray-300">{{ product.specs?.storage }}</td>
                    <td class="px-4 py-3 text-green-500 font-bold">
                      ${{ product.price?.toFixed(2) }}
                    </td>
                    <td class="px-4 py-3">
                      <button
                        @click="showProductDetails(product)"
                        class="text-blue-400 hover:text-blue-300"
                      >
                        Details
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </transition>
        </div>

        <!-- Product Grid -->
        <div id="product-grid" class="relative z-20 scroll-mt-32 pt-4">
          <div
            v-if="!groupedProducts || Object.keys(groupedProducts || {}).length === 0"
            class="text-center text-white py-10"
          >
            No products found. Please try a different filter.
          </div>

          <template v-else>
            <div
              v-for="(brandGroup, brand) in groupedProducts || {}"
              :key="brand"
              class="mb-16"
              :id="
                brand === 'NM Technology Security Monitoring' ? 'monitoring-section' : null
              "
            >
              <h2 class="text-left text-wrap text-2xl font-extrabold mb-6">
                <span
                  class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400"
                  >{{ brand }}</span
                >
              </h2>
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div
                  v-for="product in brandGroup"
                  :key="product.id"
                  :class="[
                    'rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:transform hover:scale-[1.02] backdrop-blur-sm cursor-pointer bg-gradient-to-br from-gray-800 to-gray-900',
                    product.category === 'package'
                      ? 'border border-green-500/30 hover:border-green-500/50 hover:shadow-green-500/20 ring-1 ring-green-500/20'
                      : product.category === 'monitoring'
                      ? 'border border-purple-500/30 hover:border-purple-500/50 hover:shadow-purple-500/20 ring-1 ring-purple-500/20'
                      : product.category === 'security' && product.color === 'blue'
                      ? 'border border-blue-500/30 hover:border-blue-500/50 hover:shadow-blue-500/20 ring-1 ring-blue-500/20'
                      : product.brand === 'NM Solar' && product.color === 'yellow'
                      ? 'border border-yellow-500/30 hover:border-yellow-500/50 hover:shadow-yellow-500/20 ring-1 ring-yellow-500/20'
                      : 'border border-green-500/20 hover:border-green-500/40 hover:shadow-green-500/10',
                  ]"
                  @click="showProductDetails(product)"
                  role="button"
                  :aria-label="`View details for ${product.name}`"
                >
                <div
                  v-if="product.category === 'package'"
                  class="bg-green-600/20 text-green-500 text-xs font-bold px-3 py-1 text-center flex items-center justify-center"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4 mr-1"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                    />
                  </svg>
                  CCTV SECURITY PACKAGE
                </div>
                <div
                  v-if="product.category === 'monitoring'"
                  class="bg-purple-600/20 text-purple-400 text-xs font-bold px-3 py-1 text-center flex items-center justify-center"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4 mr-1"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"
                    />
                  </svg>
                  SECURITY MONITORING
                </div>
                <div
                  v-if="product.category === 'security' && product.color === 'blue'"
                  class="bg-blue-600/20 text-blue-400 text-xs font-bold px-3 py-1 text-center flex items-center justify-center"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4 mr-1"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                    />
                  </svg>
                  HOME SECURITY SYSTEM
                </div>
                <div
                  v-if="product.brand === 'NM Solar' && product.color === 'yellow'"
                  class="bg-yellow-600/20 text-yellow-400 text-xs font-bold px-3 py-1 text-center flex items-center justify-center"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4 mr-1"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"
                    />
                  </svg>
                  SOLAR POWERED SECURITY
                </div>
                <img
                  :src="product.image || '/images/axis-dome-side.webp'"
                  :alt="product.name"
                  class="w-full h-48 object-scale-down"
                  @error="$event.target.src = '/images/axis-dome-side.webp'"
                />
                <div class="p-4">
                  <h2
                    class="text-2xl font-bold"
                    :class="{
                      'text-green-400 font-extrabold': product.category === 'package',
                      'text-purple-500 font-extrabold': product.category === 'monitoring',
                      'text-blue-400 font-extrabold':
                        product.category === 'security' && product.color === 'blue',
                      'text-yellow-400 font-extrabold':
                        product.brand === 'NM Solar' && product.color === 'yellow',
                      'text-green-600 font-bold':
                        product.category !== 'package' &&
                        product.category !== 'monitoring' &&
                        !(product.category === 'security' && product.color === 'blue') &&
                        !(product.brand === 'NM Solar' && product.color === 'yellow'),
                    }"
                  >
                    {{ product.name }}
                  </h2>
                  <p class="text-gray-400 mt-2">{{ product.description }}</p>

                  <!-- Features -->
                  <div class="mt-3 flex flex-wrap gap-2">
                    <span
                      v-for="feature in product.features.slice(
                        0,
                        product.category === 'package' ? 3 : 2
                      )"
                      :key="feature"
                      class="inline-block px-2 py-1 text-xs font-medium bg-gray-700 text-gray-300 rounded-md"
                    >
                      {{ feature }}
                    </span>
                    <span
                      v-if="
                        product.features.length > (product.category === 'package' ? 3 : 2)
                      "
                      class="inline-block px-2 py-1 text-xs font-medium bg-gray-700 text-gray-300 rounded-md"
                    >
                      +{{
                        product.features.length - (product.category === "package" ? 3 : 2)
                      }}
                      more
                    </span>
                  </div>

                  <div class="flex items-center mt-4">
                    <span
                      :class="[
                        'font-bold',
                        product.category === 'package'
                          ? 'text-xl text-green-500'
                          : product.category === 'monitoring'
                          ? 'text-xl text-purple-500'
                          : product.category === 'security' && product.color === 'blue'
                          ? 'text-xl text-blue-500'
                          : product.brand === 'NM Solar' && product.color === 'yellow'
                          ? 'text-xl text-yellow-500'
                          : 'text-lg text-green-600',
                      ]"
                    >
                      {{
                        product.price
                          ? `$${product.price.toFixed(2)}${
                              product.recurring ? "/mo" : ""
                            }`
                          : "Call For Price"
                      }}
                    </span>
                    <span
                      v-if="product.recurring"
                      class="ml-2 bg-purple-600/20 text-purple-400 text-xs px-2 py-0.5 rounded-full"
                    >
                      MONTHLY
                    </span>
                  </div>

                  <div
                    v-if="product.category === 'package'"
                    class="mt-2 text-xs text-gray-400"
                  >
                    {{ product.specs?.cameraCount || "" }} cameras ·
                    {{ product.specs?.resolution || "" }}
                  </div>
                  <div
                    v-if="product.category === 'monitoring'"
                    class="mt-2 text-xs text-gray-400"
                  >
                    {{ product.specs?.doorContacts || "" }} door contacts ·
                    {{ product.specs?.windowSensors || "" }}
                    window sensors
                  </div>
                  <div class="flex gap-2 mt-4">
                    <button
                      @click.stop="addToCart(product)"
                      :class="[
                        'flex-1 py-3 rounded-lg text-white font-semibold transition-all duration-300 flex items-center justify-center shadow-lg transform hover:scale-105',
                        product.category === 'package'
                          ? 'bg-gradient-to-r from-green-600 to-green-500 hover:from-green-500 hover:to-green-400 shadow-green-500/30'
                          : product.category === 'monitoring'
                          ? 'bg-gradient-to-r from-purple-600 to-purple-500 hover:from-purple-500 hover:to-purple-400 shadow-purple-500/30'
                          : product.category === 'security' && product.color === 'blue'
                          ? 'bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 shadow-blue-500/30'
                          : product.brand === 'NM Solar' && product.color === 'yellow'
                          ? 'bg-gradient-to-r from-yellow-600 to-yellow-500 hover:from-yellow-500 hover:to-yellow-400 shadow-yellow-500/30'
                          : 'bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 shadow-blue-500/30',
                      ]"
                    >
                      <span v-if="product.category === 'package'" class="mr-1">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="h-4 w-4"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 13l4 4L19 7"
                          />
                        </svg>
                      </span>
                      {{
                        product.category === "monitoring"
                          ? "Subscribe"
                          : "Add to Quote Cart"
                      }}
                    </button>
                    <button
                      @click.stop="showProductDetails(product)"
                      :class="[
                        'px-4 py-3 rounded-lg transition-all duration-300 cursor-pointer border transform hover:scale-105',
                        product.category === 'package'
                          ? 'border-green-500/50 hover:border-green-400 text-green-400 hover:text-green-300 hover:bg-green-900/20'
                          : product.category === 'monitoring'
                          ? 'border-purple-500/50 hover:border-purple-400 text-purple-400 hover:text-purple-300 hover:bg-purple-900/20'
                          : product.category === 'security' && product.color === 'blue'
                          ? 'border-blue-500/50 hover:border-blue-400 text-blue-400 hover:text-blue-300 hover:bg-blue-900/20'
                          : product.brand === 'NM Solar' && product.color === 'yellow'
                          ? 'border-yellow-500/50 hover:border-yellow-400 text-yellow-400 hover:text-yellow-300 hover:bg-yellow-900/20'
                          : 'border-blue-500/50 hover:border-blue-400 text-blue-400 hover:text-blue-300 hover:bg-blue-900/20',
                      ]"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                        />
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                        />
                      </svg>
                    </button>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </template>
        </div>
      </div>
    </div>
  </main>

  <!-- Recently Viewed Products Footer -->
  <transition name="fade">
    <div
      v-if="hasRecentProducts"
      class="recently-viewed-footer fixed w-full"
      :class="{ collapsed: !isRecentlyViewedExpanded }"
      role="region"
      aria-label="Recently viewed products"
      style="
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        max-height: 45px;
        z-index: 30;
      "
    >
      <!-- Toggle button -->
      <button
        @click="toggleRecentlyViewed"
        class="absolute -top-5 right-6 bg-gray-900/90 border border-gray-700 rounded-t-md px-2 py-0.5 text-xs text-gray-300 hover:text-white transition-colors duration-300 hover:bg-gray-800 shadow-md"
        :aria-expanded="isRecentlyViewedExpanded.toString()"
        aria-controls="recently-viewed-content"
      >
        {{ isRecentlyViewedExpanded ? "Hide" : "Show" }} Recently Viewed
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-3.5 w-3.5 inline ml-1 transition-transform duration-300"
          :class="{ 'rotate-180': !isRecentlyViewedExpanded }"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M19 9l-7 7-7-7"
          />
        </svg>
      </button>

      <!-- Footer content with transition -->
      <transition name="slide">
        <div
          v-if="isRecentlyViewedExpanded"
          id="recently-viewed-content"
          class="bg-gray-900/90 border-t border-gray-700 py-0.5"
          style="max-height: 40px; overflow: hidden"
        >
          <div class="container mx-auto px-4 md:px-6">
            <h2 class="text-xs font-bold text-white mb-0">Recently Viewed Products</h2>
            <div
              class="recently-viewed-scroller overflow-x-auto pb-0.5"
              style="max-height: 36px"
            >
              <div class="flex space-x-1 md:space-x-1.5" style="min-width: min-content">
                <transition-group
                  name="product-list"
                  tag="div"
                  class="flex space-x-0.5 md:space-x-1"
                >
                  <div
                    v-for="product in recentlyViewedProducts"
                    :key="product.id"
                    @click="showProductDetails(product)"
                    class="recently-viewed-item flex-shrink-0 w-16 sm:w-18 md:w-20 rounded shadow-sm overflow-hidden cursor-pointer transition-all duration-300 hover:-translate-y-0.5 bg-gray-800/60 border"
                    :class="[
                      product.category === 'package'
                        ? 'border-green-600/30 hover:shadow hover:shadow-green-500/10 hover:border-green-500/40'
                        : product.category === 'monitoring'
                        ? 'border-purple-600/30 hover:shadow hover:shadow-purple-500/10 hover:border-purple-500/40'
                        : product.category === 'security' && product.color === 'blue'
                        ? 'border-blue-600/30 hover:shadow hover:shadow-blue-500/10 hover:border-blue-500/40'
                        : product.brand === 'NM Solar' && product.color === 'yellow'
                        ? 'border-yellow-600/30 hover:shadow hover:shadow-yellow-500/10 hover:border-yellow-500/40'
                        : 'border-blue-600/30 hover:shadow hover:shadow-blue-500/10 hover:border-blue-500/40',
                    ]"
                    role="button"
                    :aria-label="`View details for ${product.name}`"
                  >
                    <img
                      :src="product.image"
                      :alt="product.name"
                      class="w-full h-7 object-scale-down p-0.5 bg-gray-900/50"
                    />
                    <div class="p-0.5">
                      <h3
                        :class="[
                          'text-[0.6rem] font-medium truncate leading-tight',
                          product.category === 'package'
                            ? 'text-green-400'
                            : product.category === 'monitoring'
                            ? 'text-purple-400'
                            : product.category === 'security' && product.color === 'blue'
                            ? 'text-blue-400'
                            : product.brand === 'NM Solar' && product.color === 'yellow'
                            ? 'text-yellow-400'
                            : 'text-blue-400',
                        ]"
                      >
                        {{ product.name }}
                      </h3>
                      <p class="text-[0.55rem] text-gray-400 mt-0 leading-tight">
                        {{ formatTimeAgo(product.timestamp) }}
                      </p>
                    </div>
                  </div>
                </transition-group>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </div>
  </transition>

  <!-- Cart Modal -->
  <CartModal class="relative z-50" :key="'cart-modal'" />

  <!-- Product Details Modal -->
  <ProductDetailsModal
    :isOpen="productDetailsOpen"
    :product="selectedProduct"
    class="relative z-[100]"
    :key="'product-details-modal'"
    @close="closeProductDetails"
  />
</template>

<script>
import { ref, computed, onMounted } from "vue";
import { useRouter } from "vue-router";
import CartModal from "../components/CartModal.vue";
import ProductFilter from "../components/ProductFilter.vue";
import BackgroundPattern from "../components/BackgroundPattern.vue";
import ProductDetailsModal from "../components/ProductDetailsModal.vue";
import RecentlyViewedProducts from "../components/RecentlyViewedProducts.vue";
import PromoBanner from "../components/PromoBanner.vue";
import { cartStore } from "../store/cartStore.js";
import { toastService } from "../services/toastService.js";
import { recentlyViewedService } from "../services/recentlyViewedService.js";
import { cameraProducts } from "../data/productData.js";
import "../components/RecentlyViewedFooter.css";

export default {
  name: "ProductsPage",
  components: {
    CartModal,
    ProductFilter,
    ProductDetailsModal,
    RecentlyViewedProducts,
    BackgroundPattern,
    PromoBanner,
  },
  setup() {
    const cartItemCount = computed(() => cartStore.getItemCount.value);
    // Ensure we have valid product data or use an empty array as fallback
    const allProducts = ref(Array.isArray(cameraProducts) ? cameraProducts : []);
    const filteredProducts = ref(
      Array.isArray(cameraProducts) ? [...cameraProducts] : []
    );
    const activeCategory = ref("all");
    const productDetailsOpen = ref(false);
    const selectedProduct = ref(null);
    const recentlyViewedProducts = computed(() => recentlyViewedService.getProducts());
    const hasRecentProducts = computed(() => recentlyViewedService.hasProducts());

    // Recently viewed products footer toggle state
    const isRecentlyViewedExpanded = ref(false);

    // Package comparison toggle state
    const showPackageComparison = ref(false);

    // Check if we were directed here with a hash and handle it appropriately
    const { currentRoute } = useRouter();

    // Add onMounted hook to handle hash navigation and fix recently viewed footer
    onMounted(() => {
      // Check for hash in URL
      if (window.location.hash) {
        const targetId = window.location.hash.substring(1); // Remove the '#' character

        // Wait longer for the DOM to fully render and products to load
        setTimeout(() => {
          if (targetId === "product-grid") {
            const element = document.getElementById("product-grid");
            if (element) {
              console.log("CcTv: Scrolling to product-grid");
              element.scrollIntoView({ behavior: "smooth", block: "start" });
            } else {
              console.warn("CcTv: Could not find #product-grid element");
            }
          }
        }, 600); // Increased timeout to ensure component is fully rendered
      }

      // Fix the position of the recently viewed footer
      const fixFooterPosition = () => {
        const footer = document.querySelector(".recently-viewed-footer");
        if (footer) {
          footer.style.position = "fixed";
          footer.style.bottom = "0";
          footer.style.left = "0";
          footer.style.width = "100%";
          footer.style.zIndex = "40";
          footer.style.maxHeight = "45px";

          // Set initial state (collapsed by default)
          if (!isRecentlyViewedExpanded.value) {
            footer.classList.add("collapsed");
          } else {
            footer.classList.remove("collapsed");
          }
        }
      };

      // Apply immediately and also after a short delay to ensure it works after all rendering
      fixFooterPosition();
      setTimeout(fixFooterPosition, 500);

      // Also fix position when window is resized
      window.addEventListener("resize", fixFooterPosition);

      // Cleanup on component unmount
      return () => {
        window.removeEventListener("resize", fixFooterPosition);
      };
    });

    // Get all package products for comparison table
    const packageProducts = computed(() => {
      return allProducts.value
        .filter((product) => product.category === "package")
        .sort((a, b) => (a.price || 0) - (b.price || 0));
    });

    // Toggle recently viewed products footer visibility
    const toggleRecentlyViewed = () => {
      isRecentlyViewedExpanded.value = !isRecentlyViewedExpanded.value;

      // Auto-hide after 10 seconds if expanded
      if (isRecentlyViewedExpanded.value) {
        setTimeout(() => {
          if (isRecentlyViewedExpanded.value) {
            isRecentlyViewedExpanded.value = false;
            try {
              localStorage.setItem("recentlyViewedExpanded", "false");
            } catch (e) {
              console.error("Error saving auto-hide preference to localStorage:", e);
            }
          }
        }, 10000); // Auto-hide after 10 seconds
      }

      // Save preference to localStorage
      try {
        localStorage.setItem(
          "recentlyViewedExpanded",
          isRecentlyViewedExpanded.value ? "true" : "false"
        );
      } catch (e) {
        console.error("Error saving preference to localStorage:", e);
      }
    };

    // Load preference from localStorage on component mount
    try {
      const savedPreference = localStorage.getItem("recentlyViewedExpanded");
      if (savedPreference !== null) {
        isRecentlyViewedExpanded.value = savedPreference === "true";
      } else {
        // By default, keep it collapsed
        isRecentlyViewedExpanded.value = false;
      }
    } catch (e) {
      console.error("Error loading preference from localStorage:", e);
    }

    // Handler for banner dismissal
    const handleBannerDismiss = () => {
      console.log("Banner dismissed!");
      // You could add additional logic here if needed
      localStorage.setItem("halloweenBannerDismissed", "true");
    };

    // Filter products by category
    const filterProducts = (categoryId) => {
      activeCategory.value = categoryId || "all";

      if (!Array.isArray(allProducts.value)) {
        console.error("Product data is not an array:", allProducts.value);
        filteredProducts.value = [];
        return;
      }

      if (categoryId === "all") {
        filteredProducts.value = [...allProducts.value];
      } else {
        filteredProducts.value = allProducts.value.filter(
          (product) => product && product.category === categoryId
        );
      }
    };

    // Group products by brand
    const groupedProducts = computed(() => {
      // Start with an empty object
      const grouped = {};

      try {
        // Make sure filteredProducts.value is an array before processing
        if (filteredProducts.value && Array.isArray(filteredProducts.value)) {
          filteredProducts.value.forEach((product) => {
            if (!product) return;
            const brandKey = product.brand || "Other";
            if (!grouped[brandKey]) {
              grouped[brandKey] = [];
            }
            grouped[brandKey].push(product);
          });

          // Sort packages by price (ascending)
          if (grouped["NM Technology Security Packages"]) {
            grouped["NM Technology Security Packages"].sort((a, b) => {
              return (a.price || 0) - (b.price || 0);
            });
          }
        }
      } catch (error) {
        console.error("Error grouping products:", error);
        // Return empty object in case of error
      }

      return grouped;
    });

    // Cart operations
    const addToCart = (product) => {
      cartStore.addItem({
        id: product.id,
        name: product.name,
        image: product.image,
        price: product.price,
      });

      // Add cart badge animation class
      const cartBadges = document.querySelectorAll(".cart-badge");
      cartBadges.forEach((badge) => {
        badge.classList.add("cart-badge-pulse");
        setTimeout(() => {
          badge.classList.remove("cart-badge-pulse");
        }, 1000);
      });

      toastService.success(`Added ${product.name} to cart!`);
    };

    const openCart = () => {
      cartStore.openCart();
    };

    // Product details modal
    const showProductDetails = (product) => {
      console.log('showProductDetails called with:', product);
      
      if (!product) {
        console.warn('No product provided to showProductDetails');
        return;
      }

      // If we receive a product with just an ID (from RecentlyViewed)
      // we need to find the full product data
      if (product && product.id && !product.features) {
        const fullProduct = allProducts.value.find((p) => p.id === product.id);
        if (fullProduct) {
          selectedProduct.value = fullProduct;
          // Add to recently viewed
          recentlyViewedService.addProduct(fullProduct);
        } else {
          selectedProduct.value = product; // Use limited data if full not found
        }
      } else {
        selectedProduct.value = product;
        // Add to recently viewed
        if (product) {
          // Make sure color property is included for proper theming
          if (product.category === "security" && !product.color) {
            product.color = "blue";
          }
          recentlyViewedService.addProduct(product);
        }
      }

      console.log('Setting productDetailsOpen to true, selectedProduct:', selectedProduct.value);
      productDetailsOpen.value = true;
    };

    const closeProductDetails = () => {
      console.log('closeProductDetails called');
      productDetailsOpen.value = false;
      // Restore scroll immediately
      document.body.style.overflow = '';
      setTimeout(() => {
        selectedProduct.value = null;
      }, 200); // Small delay to allow for animation
    };

    // Format time ago for recently viewed products
    const formatTimeAgo = (timestamp) => {
      try {
        const date = new Date(timestamp);
        const now = new Date();
        const diffMs = now - date;

        // Convert to minutes, hours, and days
        const diffMinutes = Math.floor(diffMs / 60000);
        const diffHours = Math.floor(diffMinutes / 60);
        const diffDays = Math.floor(diffHours / 24);

        if (diffDays > 0) {
          return `${diffDays} ${diffDays === 1 ? "day" : "days"} ago`;
        } else if (diffHours > 0) {
          return `${diffHours} ${diffHours === 1 ? "hour" : "hours"} ago`;
        } else if (diffMinutes > 0) {
          return `${diffMinutes} ${diffMinutes === 1 ? "minute" : "minutes"} ago`;
        } else {
          return "Just now";
        }
      } catch (e) {
        return "";
      }
    };

    // Handle scroll-to events from SecurityFAQs component
    const handleScrollTo = (targetId) => {
      let targetElement = null;

      if (targetId === "packages") {
        // Filter for packages and scroll to the top of the results
        filterProducts("package");
        targetElement = document.querySelector("#package-section");
      } else if (targetId === "monitoring") {
        // Filter for monitoring packages and scroll to the top of the results
        filterProducts("monitoring");
        targetElement = document.querySelector("#monitoring-section");
      } else if (targetId === "products" || targetId === "product-grid") {
        // Show all products
        filterProducts("all");
        targetElement = document.querySelector("#product-grid");
      }

      // Scroll to the target element if found
      if (targetElement) {
        // Use a longer delay to ensure the DOM is fully rendered after filtering
        setTimeout(() => {
          console.log(`CcTv: Scrolling to ${targetId} element`);
          targetElement.scrollIntoView({ behavior: "smooth", block: "start" });
        }, 300); // Longer delay to ensure filter has applied and DOM is updated
      } else {
        console.warn(`CcTv: Could not find element with ID: ${targetId}`);
        // Try one more time with an even longer delay if element wasn't found
        setTimeout(() => {
          const retryElement = document.querySelector(
            targetId === "products" ? "#product-grid" : `#${targetId}`
          );
          if (retryElement) {
            console.log(`CcTv: Found ${targetId} element on retry, scrolling now`);
            retryElement.scrollIntoView({ behavior: "smooth", block: "start" });
          }
        }, 600);
      }
    };

    return {
      cartItemCount,
      groupedProducts,
      activeCategory,
      productDetailsOpen,
      selectedProduct,
      recentlyViewedProducts,
      hasRecentProducts,
      isRecentlyViewedExpanded,
      showPackageComparison,
      packageProducts,
      filterProducts,
      addToCart,
      openCart,
      showProductDetails,
      closeProductDetails,
      handleBannerDismiss,
      formatTimeAgo,
      toggleRecentlyViewed,
      handleScrollTo,
    };
  },
};
</script>

<style scoped>
/* Base layout and background */
.bg-gray-900 {
  position: relative;
  min-height: 100vh;
}

/* Content area should be above background but below modals */
main {
  position: relative;
  z-index: 10; /* Lower z-index to ensure footer appears above */
}

/* Product cards should be clickable */
.rounded-lg {
  position: relative;
  z-index: 30;
}

/* Main content container */
.mx-auto.max-w-7xl {
  position: relative;
  background: rgba(17, 24, 39, 0.4);
  backdrop-filter: blur(4px);
  border-radius: 0.5rem;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
  margin-bottom: 2rem;
}

/* Make sure modals appear on top */
:deep(.modal-overlay) {
  z-index: 45;
}

:deep(.modal-container) {
  z-index: 50;
}

/* Keep recently viewed footer above content but below modals */
.recently-viewed-footer.fixed {
  z-index: 40 !important; /* Below modals but above main content */
  height: auto !important;
  max-height: 250px !important;
  background: rgba(17, 24, 39, 0.95) !important;
  border-top: 1px solid rgba(55, 65, 81, 0.5) !important;
  box-shadow: 0 -8px 16px -2px rgba(0, 0, 0, 0.3) !important;
  backdrop-filter: blur(12px) !important;
}

/* Footer toggle button */
.recently-viewed-footer .absolute {
  z-index: 41;
}

/* Background patterns should stay in back */
svg.fixed {
  z-index: -10;
}

/* Ensure product cards are clickable */
.cursor-pointer {
  position: relative;
  z-index: 30;
}

/* Improve text readability against the complex background */
h1,
p {
  text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
}

/* Product card hover effects */
.bg-gray-800:hover,
.bg-gray-800\/70:hover,
.bg-gray-800\/50:hover {
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
  transform: translateY(-4px);
  transition: all 0.3s ease;
}

/* Clickable product tile indication */
.cursor-pointer:hover {
  position: relative;
}

.cursor-pointer:hover::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  border-radius: 0.5rem;
  box-shadow: inset 0 0 0 2px rgba(22, 163, 74, 0.4);
  pointer-events: none;
}

/* Make sure SVG background doesn't interfere with interactive elements */
svg.fixed,
svg.absolute {
  pointer-events: none;
}

/* Ensure fixed backgrounds cover the full viewport */
.fixed {
  min-height: 100vh;
  width: 100%;
}

/* Add margin-top to account for the TopBanner and PromoBanner */
main {
  margin-top: 30px;
  padding-bottom: 150px; /* Extra padding to account for fixed footer */
}

/* Add some spacing between brand sections */
.mb-16 {
  position: relative;
  z-index: 10;
}

/* Recently viewed products footer styling */
.recently-viewed-footer {
  border-top: 1px solid rgba(55, 65, 81, 0.5);
  box-shadow: 0 -8px 16px -2px rgba(0, 0, 0, 0.3), 0 -4px 8px -2px rgba(0, 0, 0, 0.2);
  backdrop-filter: blur(12px);
  transition: transform 0.3s ease;
  max-height: 250px; /* Limit the height of the footer */
  overflow: auto;
}

/* Footer container styles */
.recently-viewed-footer .container {
  max-width: 100%;
  margin: 0 auto;
}

/* Product list container in footer */
.recently-viewed-footer .overflow-x-auto {
  max-height: 150px; /* Leave room for the header */
  overflow-y: auto;
  overflow-x: auto;
}

/* Recently viewed toggle button */
.recently-viewed-footer button.absolute {
  z-index: 41; /* Ensure the toggle button is always clickable */
}

/* Hide scrollbar for Chrome, Safari and Opera */
.overflow-x-auto::-webkit-scrollbar {
  height: 6px;
  width: 6px;
}

.overflow-x-auto::-webkit-scrollbar-track {
  background: rgba(31, 41, 55, 0.5);
  border-radius: 10px;
}

.overflow-x-auto::-webkit-scrollbar-thumb {
  background: rgba(75, 85, 99, 0.5);
  border-radius: 10px;
}

/* Main content area padding to prevent content from being hidden behind footer */
main {
  padding-bottom: 320px; /* Increased padding to account for footer height */
}

/* Transition animations for recently viewed products */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

.product-list-enter-active,
.product-list-leave-active {
  transition: all 0.5s ease;
}

.product-list-enter-from {
  opacity: 0;
  transform: translateY(30px);
}

.product-list-leave-to {
  opacity: 0;
  transform: translateX(-30px);
}

.product-list-move {
  transition: transform 0.5s ease;
}

/* Slide animation for footer content and package comparison */
.slide-enter-active,
.slide-leave-active {
  transition: max-height 0.3s ease, opacity 0.3s ease;
  max-height: 250px;
  overflow: hidden;
}

.slide-enter-from,
.slide-leave-to {
  max-height: 0;
  opacity: 0;
  overflow: hidden;
}

/* Special styles for package cards */
.bg-gray-800\/70.border-green-600\/30 {
  transition: all 0.3s ease;
}

.bg-gray-800\/70.border-green-600\/30:hover {
  border-color: rgba(22, 163, 74, 0.5); /* More visible border on hover */
  box-shadow: 0 0 15px rgba(22, 163, 74, 0.2); /* Green glow effect */
}

/* Special styles for monitoring cards */
.bg-gray-800\/70.border-purple-600\/30 {
  transition: all 0.3s ease;
}

.bg-gray-800\/70.border-purple-600\/30:hover {
  border-color: rgba(147, 51, 234, 0.5); /* More visible border on hover */
  box-shadow: 0 0 15px rgba(147, 51, 234, 0.2); /* Purple glow effect */
}

/* Special styles for security cards */
.bg-gray-800\/70.border-blue-600\/30 {
  transition: all 0.3s ease;
}

.bg-gray-800\/70.border-blue-600\/30:hover {
  border-color: rgba(37, 99, 235, 0.5); /* More visible border on hover */
  box-shadow: 0 0 15px rgba(37, 99, 235, 0.2); /* Blue glow effect */
}

/* Special styles for solar powered cards */
.bg-gray-800\/70.border-yellow-600\/30 {
  transition: all 0.3s ease;
}

.bg-gray-800\/70.border-yellow-600\/30:hover {
  border-color: rgba(234, 179, 8, 0.5); /* More visible border on hover */
  box-shadow: 0 0 15px rgba(234, 179, 8, 0.2); /* Yellow glow effect */
}

/* Special styles for blue security cards */
.bg-gray-800\/70.border-blue-600\/30 {
  transition: all 0.3s ease;
}

.bg-gray-800\/70.border-blue-600\/30:hover {
  border-color: rgba(37, 99, 235, 0.5); /* More visible blue border on hover */
  box-shadow: 0 0 15px rgba(37, 99, 235, 0.2); /* Blue glow effect */
}

/* Package comparison table styles */
table {
  border-collapse: separate;
  border-spacing: 0;
  border-radius: 8px;
  overflow: hidden;
}

th:first-child {
  border-top-left-radius: 8px;
}

th:last-child {
  border-top-right-radius: 8px;
}

/* Smooth scrolling for FAQ section */
html {
  scroll-behavior: smooth;
}

/* Animation styles for scroll transitions */
.scroll-transition {
  transition: all 0.5s ease;
}

/* Base layout styling */
main {
  position: relative;
  margin-top: 30px;
  padding-bottom: 150px; /* Space for footer */
  z-index: 1; /* Lower z-index for main content */
}

/* Content container */
.mx-auto.max-w-7xl {
  position: relative;
  z-index: 1;
  background: rgba(17, 24, 39, 0.4);
  backdrop-filter: blur(4px);
  border-radius: 0.5rem;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
  margin-bottom: 2rem;
}

/* Product grid and cards */
#product-grid {
  position: relative;
  z-index: 2;
}

.cursor-pointer {
  position: relative;
  z-index: 2;
}

/* Recently viewed footer styling */
.recently-viewed-footer.fixed {
  position: fixed !important;
  bottom: 0 !important;
  left: 0 !important;
  right: 0 !important;
  z-index: 40 !important; /* Reduced z-index to stay below modals */
  height: auto !important;
  max-height: 250px !important;
  background: rgba(17, 24, 39, 0.95) !important;
  border-top: 1px solid rgba(55, 65, 81, 0.5) !important;
  box-shadow: 0 -8px 16px -2px rgba(0, 0, 0, 0.3) !important;
  backdrop-filter: blur(12px) !important;
}

/* Footer toggle button */
.recently-viewed-footer .absolute {
  z-index: 41;
}

/* Footer content container */
.recently-viewed-footer .container {
  position: relative;
  height: 100%;
  max-height: 200px;
  overflow-y: auto;
}

/* Product list in recently viewed footer */
.recently-viewed-footer .overflow-x-auto {
  max-height: 150px;
  overflow-y: hidden;
}

/* Modal z-indices */
:deep(.modal-overlay) {
  z-index: 45;
}

:deep(.modal-container) {
  z-index: 50;
}

/* Background pattern */
svg.fixed {
  z-index: -10;
}

/* Transition animations */
.slide-enter-active,
.slide-leave-active {
  transition: all 0.3s ease;
  max-height: 500px;
  overflow: hidden;
}

.slide-enter-from,
.slide-leave-to {
  max-height: 0;
  opacity: 0;
  overflow: hidden;
}

/* Hide scrollbar for cleaner look */
.overflow-x-auto::-webkit-scrollbar {
  height: 6px;
  width: 6px;
}

.overflow-x-auto::-webkit-scrollbar-track {
  background: rgba(31, 41, 55, 0.5);
  border-radius: 10px;
}

.overflow-x-auto::-webkit-scrollbar-thumb {
  background: rgba(75, 85, 99, 0.5);
  border-radius: 10px;
}

/* Recently viewed products footer styling */
.recently-viewed-footer .container {
  position: relative;
  max-height: 250px;
  overflow-y: auto;
}

/* Recently viewed items styles */
.recently-viewed-scroller {
  padding-bottom: 0.75rem;
  -ms-overflow-style: none; /* IE and Edge */
  scrollbar-width: thin; /* Firefox */
}

.recently-viewed-scroller::-webkit-scrollbar {
  height: 6px;
}

.recently-viewed-scroller::-webkit-scrollbar-track {
  background: rgba(17, 24, 39, 0.4);
  border-radius: 10px;
}

.recently-viewed-scroller::-webkit-scrollbar-thumb {
  background: rgba(55, 65, 81, 0.7);
  border-radius: 10px;
}

.recently-viewed-scroller::-webkit-scrollbar-thumb:hover {
  background: rgba(75, 85, 99, 0.9);
}

.recently-viewed-item {
  transition: all 0.3s ease;
}

.recently-viewed-item:hover {
  transform: translateY(-4px);
}

/* Add this at the end of your <style> section */

/* Reset for recently viewed footer to ensure proper display */
.recently-viewed-footer {
  display: block !important;
  position: fixed !important;
  bottom: 0 !important;
  left: 0 !important;
  width: 100% !important;
  height: auto !important;
  max-height: 120px !important;
  overflow: visible !important;
  z-index: 30 !important;
}

.recently-viewed-footer > div {
  max-height: 100px !important;
  overflow-y: auto !important;
}

.recently-viewed-scroller {
  max-height: 70px !important;
  overflow-x: auto !important;
  overflow-y: hidden !important;
}

/* Make sure content doesn't get hidden behind the footer */
.bg-gray-900 {
  padding-bottom: 150px !important;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
.animate-fadeIn {
  animation: fadeIn 1s ease-out;
}
</style>
