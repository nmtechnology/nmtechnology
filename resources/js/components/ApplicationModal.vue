<!-- eslint-disable no-mixed-spaces-and-tabs -->
<!-- eslint-disable no-tabs -->
<template>
  <!-- Modal is opened via inject/provide from parent components -->
  <teleport to="body">
    <div v-if="isOpen" class="relative z-50">
      <!-- Backdrop -->
      <div class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm" aria-hidden="true"></div>

      <!-- Modal container -->
      <div class="fixed inset-0 z-50 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4">
          <!-- Modal panel -->
          <div
            class="relative w-full max-w-4xl bg-gradient-to-br from-gray-900 to-gray-800 border border-green-600/50 rounded-xl shadow-2xl shadow-green-500/20 transform transition-all duration-300"
          >
            <!-- Header -->
            <div class="relative px-6 py-8 bg-gradient-to-r from-green-600/20 to-lime-600/20 border-b border-gray-700/50 rounded-t-xl">
              <div class="absolute inset-0 bg-gradient-to-r from-green-500/5 to-lime-500/5 rounded-t-xl"></div>
              <div class="relative flex items-center justify-between">
                <div class="flex items-center space-x-4">
                  <NMLogo variant="modal" size="large" />
                  <div>
                    <h2 class="text-2xl sm:text-3xl font-bold text-white">
                      Join Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400">Team!</span>
                    </h2>
                    <p class="mt-2 text-gray-300">Apply for a career opportunity at NM Technology</p>
                  </div>
                </div>
                <button
                  @click="closeModal"
                  class="rounded-full p-2 text-gray-400 hover:text-white hover:bg-gray-700/50 transition-all duration-200"
                >
                  <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
            </div>

            <!-- Form Content -->
            <div class="px-6 py-8 max-h-[calc(100vh-200px)] overflow-y-auto">
              <!-- Success Message -->
              <div
                v-if="showSuccessMessage"
                class="mb-6 p-4 bg-gradient-to-r from-green-500/20 to-lime-500/20 border border-green-500/50 rounded-lg"
              >
                <div class="flex items-center">
                  <svg class="h-6 w-6 text-green-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <div>
                    <h3 class="text-white font-semibold">Application Submitted Successfully!</h3>
                    <p class="text-gray-300 text-sm mt-1">
                      Thank you for your interest! We'll review your application and contact you soon.
                    </p>
                  </div>
                </div>
                <div class="mt-4 text-center">
                  <button
                    @click="closeModal"
                    class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors duration-300"
                  >
                    Close
                  </button>
                </div>
              </div>

              <!-- Application Form -->
              <form v-if="!showSuccessMessage" @submit.prevent="submitApplication" class="space-y-8">
                <!-- Personal Information -->
                <div class="bg-gray-800/50 p-6 rounded-lg border border-gray-700/50">
                  <h3 class="text-lg font-semibold text-white mb-4 flex items-center">
                    <svg class="h-5 w-5 mr-2 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Personal Information
                  </h3>
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                      <label class="block text-sm font-medium text-gray-300 mb-2">First Name *</label>
                      <input
                        v-model="formData.firstName"
                        type="text"
                        required
                        class="w-full px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-colors duration-300"
                        placeholder="Enter your first name"
                      />
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-300 mb-2">Last Name *</label>
                      <input
                        v-model="formData.lastName"
                        type="text"
                        required
                        class="w-full px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-colors duration-300"
                        placeholder="Enter your last name"
                      />
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-300 mb-2">Email Address *</label>
                      <input
                        v-model="formData.email"
                        type="email"
                        required
                        class="w-full px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-colors duration-300"
                        placeholder="your.email@example.com"
                      />
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-300 mb-2">Phone Number *</label>
                      <input
                        v-model="formData.phone"
                        type="tel"
                        required
                        class="w-full px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-colors duration-300"
                        placeholder="(555) 123-4567"
                      />
                    </div>
                  </div>
                  <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Address *</label>
                    <input
                      v-model="formData.address"
                      type="text"
                      required
                      class="w-full px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-colors duration-300"
                      placeholder="Street address, City, State, ZIP"
                    />
                  </div>
                </div>

                <!-- Position Applied For -->
                <div class="bg-gray-800/50 p-6 rounded-lg border border-gray-700/50">
                  <h3 class="text-lg font-semibold text-white mb-4 flex items-center">
                    <svg class="h-5 w-5 mr-2 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0H8m8 0v2a2 2 0 01-2 2H10a2 2 0 01-2-2V6m8 0H8m0 10h8a2 2 0 002-2V8a2 2 0 00-2-2H8a2 2 0 00-2 2v6a2 2 0 002 2z" />
                    </svg>
                    Position Information
                  </h3>
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                      <label class="block text-sm font-medium text-gray-300 mb-2">Position Applied For *</label>
                      <select
                        v-model="formData.position"
                        required
                        class="w-full px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-white focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-colors duration-300"
                      >
                        <option value="">Select a position</option>
                        <option value="Security Technician">Security Technician</option>
                        <option value="CCTV Installer">CCTV Installer</option>
                        <option value="Fire Alarm Technician">Fire Alarm Technician</option>
                        <option value="Network Engineer">Network Engineer</option>
                        <option value="Project Manager">Project Manager</option>
                        <option value="Customer Service Rep">Customer Service Representative</option>
                        <option value="Sales Representative">Sales Representative</option>
                        <option value="Administrative Assistant">Administrative Assistant</option>
                        <option value="Other">Other (Please specify in cover letter)</option>
                      </select>
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-300 mb-2">Desired Salary Range</label>
                      <select
                        v-model="formData.salaryRange"
                        class="w-full px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-white focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-colors duration-300"
                      >
                        <option value="">Negotiable</option>
                        <option value="$30,000 - $40,000">$30,000 - $40,000</option>
                        <option value="$40,000 - $50,000">$40,000 - $50,000</option>
                        <option value="$50,000 - $60,000">$50,000 - $60,000</option>
                        <option value="$60,000 - $70,000">$60,000 - $70,000</option>
                        <option value="$70,000+">$70,000+</option>
                      </select>
                    </div>
                  </div>
                  <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Availability *</label>
                    <select
                      v-model="formData.availability"
                      required
                      class="w-full px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-white focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-colors duration-300"
                    >
                      <option value="">Select availability</option>
                      <option value="Immediate">Available Immediately</option>
                      <option value="2 weeks">Available in 2 weeks</option>
                      <option value="1 month">Available in 1 month</option>
                      <option value="Other">Other (Please specify in cover letter)</option>
                    </select>
                  </div>
                </div>

                <!-- Work Experience -->
                <div class="bg-gray-800/50 p-6 rounded-lg border border-gray-700/50">
                  <h3 class="text-lg font-semibold text-white mb-4 flex items-center">
                    <svg class="h-5 w-5 mr-2 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Work Experience
                  </h3>
                  <div class="space-y-4">
                    <div>
                      <label class="block text-sm font-medium text-gray-300 mb-2">Years of Experience in Security/Technology *</label>
                      <select
                        v-model="formData.experience"
                        required
                        class="w-full px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-white focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-colors duration-300"
                      >
                        <option value="">Select experience level</option>
                        <option value="Entry Level">Entry Level (0-1 years)</option>
                        <option value="1-3 years">1-3 years</option>
                        <option value="3-5 years">3-5 years</option>
                        <option value="5-10 years">5-10 years</option>
                        <option value="10+ years">10+ years</option>
                      </select>
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-300 mb-2">Current/Previous Employment</label>
                      <textarea
                        v-model="formData.previousEmployment"
                        rows="3"
                        class="w-full px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-colors duration-300"
                        placeholder="Tell us about your current or most recent employment (company, position, responsibilities)..."
                      ></textarea>
                    </div>
                  </div>
                </div>

                <!-- Education & Certifications -->
                <div class="bg-gray-800/50 p-6 rounded-lg border border-gray-700/50">
                  <h3 class="text-lg font-semibold text-white mb-4 flex items-center">
                    <svg class="h-5 w-5 mr-2 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    Education & Certifications
                  </h3>
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                      <label class="block text-sm font-medium text-gray-300 mb-2">Highest Education Level *</label>
                      <select
                        v-model="formData.education"
                        required
                        class="w-full px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-white focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-colors duration-300"
                      >
                        <option value="">Select education level</option>
                        <option value="High School">High School Diploma/GED</option>
                        <option value="Associate">Associate's Degree</option>
                        <option value="Bachelor">Bachelor's Degree</option>
                        <option value="Master">Master's Degree</option>
                        <option value="Technical">Technical/Trade School</option>
                        <option value="Other">Other</option>
                      </select>
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-300 mb-2">Relevant Certifications</label>
                      <input
                        v-model="formData.certifications"
                        type="text"
                        class="w-full px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-colors duration-300"
                        placeholder="e.g., CompTIA Security+, Fire Alarm License, etc."
                      />
                    </div>
                  </div>
                </div>

                <!-- Cover Letter -->
                <div class="bg-gray-800/50 p-6 rounded-lg border border-gray-700/50">
                  <h3 class="text-lg font-semibold text-white mb-4 flex items-center">
                    <svg class="h-5 w-5 mr-2 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    Cover Letter
                  </h3>
                  <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Why do you want to work at NM Technology? *</label>
                    <textarea
                      v-model="formData.coverLetter"
                      rows="6"
                      required
                      class="w-full px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-colors duration-300"
                      placeholder="Tell us about yourself, your relevant experience, why you're interested in this position, and what you can bring to our team..."
                    ></textarea>
                  </div>
                </div>

                <!-- Document Upload -->
                <div class="bg-gray-800/50 p-6 rounded-lg border border-gray-700/50">
                  <h3 class="text-lg font-semibold text-white mb-4 flex items-center">
                    <svg class="h-5 w-5 mr-2 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                    </svg>
                    Upload Documents
                  </h3>
                  <div class="space-y-4">
                    <!-- Resume Upload -->
                    <div>
                      <label class="block text-sm font-medium text-gray-300 mb-2">Resume *</label>
                      <div class="relative">
                        <input
                          ref="resumeInput"
                          type="file"
                          accept=".pdf,.doc,.docx"
                          required
                          @change="handleResumeUpload"
                          class="hidden"
                        />
                        <button
                          type="button"
                          @click="$refs.resumeInput.click()"
                          class="w-full flex items-center justify-center px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-gray-300 hover:border-green-500 hover:bg-gray-700 transition-colors duration-300"
                          :class="{ 'border-green-500 bg-gray-700': formData.resume }"
                        >
                          <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                          </svg>
                          {{ formData.resume ? formData.resume.name : 'Choose Resume File' }}
                        </button>
                      </div>
                      <p class="text-xs text-gray-400 mt-1">PDF, DOC, or DOCX files only. Max size: 5MB</p>
                      
                      <!-- Resume Upload Status -->
                      <div v-if="uploadStatus.resume" class="mt-2 flex items-center text-sm">
                        <div v-if="uploadStatus.resume === 'uploading'" class="flex items-center text-yellow-400">
                          <svg class="animate-spin h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                          </svg>
                          Uploading and scanning...
                        </div>
                        <div v-else-if="uploadStatus.resume === 'scanning'" class="flex items-center text-blue-400">
                          <svg class="animate-pulse h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                          Virus scanning...
                        </div>
                        <div v-else-if="uploadStatus.resume === 'success'" class="flex items-center text-green-400">
                          <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                          </svg>
                          File verified and ready
                        </div>
                        <div v-else-if="uploadStatus.resume === 'error'" class="flex items-center text-red-400">
                          <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                          Upload failed or virus detected
                        </div>
                      </div>
                    </div>

                    <!-- Cover Letter Upload -->
                    <div>
                      <label class="block text-sm font-medium text-gray-300 mb-2">Cover Letter (Optional)</label>
                      <div class="relative">
                        <input
                          ref="coverLetterInput"
                          type="file"
                          accept=".pdf,.doc,.docx"
                          @change="handleCoverLetterUpload"
                          class="hidden"
                        />
                        <button
                          type="button"
                          @click="$refs.coverLetterInput.click()"
                          class="w-full flex items-center justify-center px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-gray-300 hover:border-green-500 hover:bg-gray-700 transition-colors duration-300"
                          :class="{ 'border-green-500 bg-gray-700': formData.coverLetterFile }"
                        >
                          <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                          </svg>
                          {{ formData.coverLetterFile ? formData.coverLetterFile.name : 'Choose Cover Letter File' }}
                        </button>
                      </div>
                      <p class="text-xs text-gray-400 mt-1">PDF, DOC, or DOCX files only. Max size: 5MB</p>
                      
                      <!-- Cover Letter Upload Status -->
                      <div v-if="uploadStatus.coverLetter" class="mt-2 flex items-center text-sm">
                        <div v-if="uploadStatus.coverLetter === 'uploading'" class="flex items-center text-yellow-400">
                          <svg class="animate-spin h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                          </svg>
                          Uploading and scanning...
                        </div>
                        <div v-else-if="uploadStatus.coverLetter === 'scanning'" class="flex items-center text-blue-400">
                          <svg class="animate-pulse h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                          Virus scanning...
                        </div>
                        <div v-else-if="uploadStatus.coverLetter === 'success'" class="flex items-center text-green-400">
                          <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                          </svg>
                          File verified and ready
                        </div>
                        <div v-else-if="uploadStatus.coverLetter === 'error'" class="flex items-center text-red-400">
                          <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                          Upload failed or virus detected
                        </div>
                      </div>
                    </div>

                    <div class="bg-blue-900/20 border border-blue-600/30 rounded-lg p-4">
                      <div class="flex items-start">
                        <svg class="h-5 w-5 text-blue-400 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-sm">
                          <p class="text-blue-300 font-medium mb-1">Document Security</p>
                          <p class="text-blue-200">All uploaded documents are automatically scanned for viruses and malware before being processed. Only clean, verified files will be included with your application.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- References -->
                <div class="bg-gray-800/50 p-6 rounded-lg border border-gray-700/50">
                  <h3 class="text-lg font-semibold text-white mb-4 flex items-center">
                    <svg class="h-5 w-5 mr-2 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Professional References
                  </h3>
                  <div class="space-y-4">
                    <div>
                      <label class="block text-sm font-medium text-gray-300 mb-2">Reference 1 (Name, Company, Phone, Email)</label>
                      <textarea
                        v-model="formData.reference1"
                        rows="2"
                        class="w-full px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-colors duration-300"
                        placeholder="John Smith, ABC Company, (555) 123-4567, john.smith@example.com"
                      ></textarea>
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-300 mb-2">Reference 2 (Name, Company, Phone, Email)</label>
                      <textarea
                        v-model="formData.reference2"
                        rows="2"
                        class="w-full px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-colors duration-300"
                        placeholder="Jane Doe, XYZ Corp, (555) 987-6543, jane.doe@example.com"
                      ></textarea>
                    </div>
                  </div>
                </div>

                <!-- Legal Questions -->
                <div class="bg-gray-800/50 p-6 rounded-lg border border-gray-700/50">
                  <h3 class="text-lg font-semibold text-white mb-4 flex items-center">
                    <svg class="h-5 w-5 mr-2 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    Legal & Background
                  </h3>
                  <div class="space-y-4">
                    <div>
                      <label class="block text-sm font-medium text-gray-300 mb-2">Are you legally authorized to work in the United States? *</label>
                      <div class="flex space-x-4">
                        <label class="flex items-center">
                          <input v-model="formData.workAuthorized" type="radio" value="yes" required class="text-green-500 focus:ring-green-500 bg-gray-700 border-gray-600" />
                          <span class="ml-2 text-gray-300">Yes</span>
                        </label>
                        <label class="flex items-center">
                          <input v-model="formData.workAuthorized" type="radio" value="no" required class="text-green-500 focus:ring-green-500 bg-gray-700 border-gray-600" />
                          <span class="ml-2 text-gray-300">No</span>
                        </label>
                      </div>
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-300 mb-2">Do you have a valid driver's license? *</label>
                      <div class="flex space-x-4">
                        <label class="flex items-center">
                          <input v-model="formData.driversLicense" type="radio" value="yes" required class="text-green-500 focus:ring-green-500 bg-gray-700 border-gray-600" />
                          <span class="ml-2 text-gray-300">Yes</span>
                        </label>
                        <label class="flex items-center">
                          <input v-model="formData.driversLicense" type="radio" value="no" required class="text-green-500 focus:ring-green-500 bg-gray-700 border-gray-600" />
                          <span class="ml-2 text-gray-300">No</span>
                        </label>
                      </div>
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-300 mb-2">Have you ever been convicted of a felony? *</label>
                      <div class="flex space-x-4">
                        <label class="flex items-center">
                          <input v-model="formData.felonyConviction" type="radio" value="yes" required class="text-green-500 focus:ring-green-500 bg-gray-700 border-gray-600" />
                          <span class="ml-2 text-gray-300">Yes</span>
                        </label>
                        <label class="flex items-center">
                          <input v-model="formData.felonyConviction" type="radio" value="no" required class="text-green-500 focus:ring-green-500 bg-gray-700 border-gray-600" />
                          <span class="ml-2 text-gray-300">No</span>
                        </label>
                      </div>
                      <p class="text-xs text-gray-400 mt-1">
                        A conviction will not necessarily disqualify you from employment. We consider each case individually.
                      </p>
                    </div>
                  </div>
                </div>

                <!-- Human Verification -->
                <div class="bg-gray-800/50 p-6 rounded-lg border border-gray-700/50">
                  <h3 class="text-lg font-semibold text-white mb-4 flex items-center">
                    <svg class="h-5 w-5 mr-2 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    Human Verification
                  </h3>
                  <div class="p-4 bg-gradient-to-br from-gray-800/80 to-gray-800/60 rounded-md border border-gray-700/50 shadow-md">
                    <div class="flex items-center gap-2 mb-3">
                      <span class="text-white font-medium">Math Problem:</span>
                      <span class="text-green-400 font-bold text-lg">{{ mathProblem }}</span>
                      <button
                        type="button"
                        @click="generateMathProblem"
                        class="ml-2 inline-flex items-center text-sm text-green-400 hover:text-green-300 bg-gray-700/80 hover:bg-gray-600/80 px-3 py-1.5 rounded-md transition-colors duration-200"
                        aria-label="Get a new math problem"
                      >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Try different problem
                      </button>
                    </div>
                    <div class="flex items-center gap-3">
                      <label class="text-gray-300 font-medium">Answer:</label>
                      <input
                        v-model="mathAnswer"
                        type="number"
                        required
                        class="w-24 px-3 py-2 bg-gray-700/60 border border-gray-600 rounded-md text-white text-center focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-colors duration-300"
                        placeholder="?"
                      />
                    </div>
                  </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-700/50">
                  <button
                    type="button"
                    @click="closeModal"
                    class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg font-semibold transition-colors duration-300"
                  >
                    Cancel
                  </button>
                  <button
                    type="submit"
                    :disabled="isSubmitting"
                    class="px-8 py-3 bg-gradient-to-r from-green-600 to-green-500 hover:from-green-500 hover:to-green-400 disabled:from-gray-600 disabled:to-gray-600 text-white rounded-lg font-semibold shadow-lg shadow-green-500/30 transition-all duration-300 transform hover:scale-105 disabled:scale-100 disabled:shadow-none flex items-center gap-2"
                  >
                    <svg
                      v-if="isSubmitting"
                      class="animate-spin h-5 w-5"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                    >
                      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <svg v-else class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                    {{ isSubmitting ? 'Submitting...' : 'Submit Application' }}
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </teleport>
</template>

<script>
import axios from 'axios'
import NMLogo from './NMLogo.vue'

export default {
  name: 'ApplicationModal',
  components: {
    NMLogo
  },
  data() {
    return {
      isOpen: false,
      isSubmitting: false,
      showSuccessMessage: false,
      mathProblem: '',
      mathAnswer: '',
      correctAnswer: 0,
      uploadStatus: {
        resume: null,
        coverLetter: null
      },
      formData: {
        firstName: '',
        lastName: '',
        email: '',
        phone: '',
        address: '',
        position: '',
        salaryRange: '',
        availability: '',
        experience: '',
        previousEmployment: '',
        education: '',
        certifications: '',
        coverLetter: '',
        reference1: '',
        reference2: '',
        workAuthorized: '',
        driversLicense: '',
        felonyConviction: '',
        resume: null,
        coverLetterFile: null,
        resumeId: null,
        coverLetterFileId: null
      }
    }
  },
  mounted() {
    this.generateMathProblem()
  },
  methods: {
    openModalFromOptions() {
      this.isOpen = true
      this.showSuccessMessage = false
      this.generateMathProblem()
    },
    closeModal() {
      this.isOpen = false
      this.showSuccessMessage = false
      this.resetForm()
    },
    resetForm() {
      this.formData = {
        firstName: '',
        lastName: '',
        email: '',
        phone: '',
        address: '',
        position: '',
        salaryRange: '',
        availability: '',
        experience: '',
        previousEmployment: '',
        education: '',
        certifications: '',
        coverLetter: '',
        reference1: '',
        reference2: '',
        workAuthorized: '',
        driversLicense: '',
        felonyConviction: '',
        resume: null,
        coverLetterFile: null,
        resumeId: null,
        coverLetterFileId: null
      }
      this.uploadStatus = {
        resume: null,
        coverLetter: null
      }
      this.mathAnswer = ''
      this.generateMathProblem()
    },
    generateMathProblem() {
      const operations = [
        () => {
          const a = Math.floor(Math.random() * 10) + 1
          const b = Math.floor(Math.random() * 10) + 1
          this.correctAnswer = a + b
          return `${a} + ${b} = ?`
        },
        () => {
          const a = Math.floor(Math.random() * 10) + 5
          const b = Math.floor(Math.random() * 5) + 1
          this.correctAnswer = a - b
          return `${a} - ${b} = ?`
        },
        () => {
          const a = Math.floor(Math.random() * 10) + 1
          const b = Math.floor(Math.random() * 10) + 1
          this.correctAnswer = a * b
          return `${a} × ${b} = ?`
        }
      ]
      const randomOperation = operations[Math.floor(Math.random() * operations.length)]
      this.mathProblem = randomOperation()
      this.mathAnswer = ''
    },
    async handleResumeUpload(event) {
      const file = event.target.files[0]
      if (!file) return

      // Validate file
      if (!this.validateFile(file)) return

      this.formData.resume = file
      this.uploadStatus.resume = 'uploading'

      try {
        const result = await this.uploadFile(file, 'resume')
        this.formData.resumeId = result.fileId
        this.uploadStatus.resume = 'success'
      } catch (error) {
        this.uploadStatus.resume = 'error'
        this.formData.resume = null
        console.error('Resume upload failed:', error)
        alert('Resume upload failed. Please try again or contact support.')
      }
    },
    async handleCoverLetterUpload(event) {
      const file = event.target.files[0]
      if (!file) return

      // Validate file
      if (!this.validateFile(file)) return

      this.formData.coverLetterFile = file
      this.uploadStatus.coverLetter = 'uploading'

      try {
        const result = await this.uploadFile(file, 'cover-letter')
        this.formData.coverLetterFileId = result.fileId
        this.uploadStatus.coverLetter = 'success'
      } catch (error) {
        this.uploadStatus.coverLetter = 'error'
        this.formData.coverLetterFile = null
        console.error('Cover letter upload failed:', error)
        alert('Cover letter upload failed. Please try again or contact support.')
      }
    },
    validateFile(file) {
      // Check file size (5MB max)
      const maxSize = 5 * 1024 * 1024 // 5MB in bytes
      if (file.size > maxSize) {
        alert('File size must be less than 5MB')
        return false
      }

      // Check file type
      const allowedTypes = [
        'application/pdf',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
      ]
      if (!allowedTypes.includes(file.type)) {
        alert('Please upload PDF, DOC, or DOCX files only')
        return false
      }

      return true
    },
    async uploadFile(file, type) {
      const formData = new FormData()
      formData.append('file', file)
      formData.append('type', type)

      // First upload the file
      const uploadResponse = await axios.post('/api/upload-document', formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      })

      if (uploadResponse.data.success) {
        // Update status to scanning
        this.uploadStatus[type === 'resume' ? 'resume' : 'coverLetter'] = 'scanning'
        
        // Wait a moment for dramatic effect (virus scanning)
        await new Promise(resolve => setTimeout(resolve, 2000))
        
        return uploadResponse.data
      } else {
        throw new Error(uploadResponse.data.message || 'Upload failed')
      }
    },
    async submitApplication() {
      if (this.isSubmitting) return

      // Validate math answer
      if (parseInt(this.mathAnswer) !== this.correctAnswer) {
        alert('Please solve the math problem correctly to verify you are human.')
        return
      }

      // Validate required resume upload
      if (!this.formData.resume || !this.formData.resumeId) {
        alert('Please upload your resume before submitting.')
        return
      }

      // Check if resume upload is still in progress
      if (this.uploadStatus.resume === 'uploading' || this.uploadStatus.resume === 'scanning') {
        alert('Please wait for your resume to finish uploading and scanning.')
        return
      }

      // Check if cover letter is still uploading (if provided)
      if (this.formData.coverLetterFile && (this.uploadStatus.coverLetter === 'uploading' || this.uploadStatus.coverLetter === 'scanning')) {
        alert('Please wait for your cover letter to finish uploading and scanning.')
        return
      }

      this.isSubmitting = true

      try {
        const applicationData = {
          ...this.formData,
          mathAnswer: this.mathAnswer,
          correctAnswer: this.correctAnswer,
          resumeId: this.formData.resumeId,
          coverLetterFileId: this.formData.coverLetterFileId
        }

        // Remove file objects from the data (we'll send IDs instead)
        delete applicationData.resume
        delete applicationData.coverLetterFile

        const response = await axios.post('/api/applications', applicationData)

        if (response.status === 200) {
          this.showSuccessMessage = true
          console.log('Application submitted successfully:', response.data)
        } else {
          throw new Error('Failed to submit application')
        }
      } catch (error) {
        console.error('Error submitting application:', error)
        alert('There was an error submitting your application. Please try again or contact us directly.')
      } finally {
        this.isSubmitting = false
      }
    }
  }
}
</script>

<style scoped>
/* Custom scrollbar for modal content */
.overflow-y-auto::-webkit-scrollbar {
  width: 8px;
}

.overflow-y-auto::-webkit-scrollbar-track {
  background: rgba(55, 65, 81, 0.3);
  border-radius: 4px;
}

.overflow-y-auto::-webkit-scrollbar-thumb {
  background: rgba(34, 197, 94, 0.5);
  border-radius: 4px;
}

.overflow-y-auto::-webkit-scrollbar-thumb:hover {
  background: rgba(34, 197, 94, 0.7);
}

/* Radio button styling */
input[type="radio"] {
  accent-color: #22c55e;
}

/* Focus styles for form elements */
input:focus,
select:focus,
textarea:focus {
  outline: none;
  box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
}

/* Loading animation */
@keyframes spin {
  to {
    transform: rotate(360deg);
  }
}

.animate-spin {
  animation: spin 1s linear infinite;
}
</style>