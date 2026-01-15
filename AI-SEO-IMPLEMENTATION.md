# AI SEO Implementation - NM Technology

## Overview
This implementation optimizes the NM Technology website for AI search engines and chatbots (ChatGPT, Claude, Perplexity, Google SGE, Bing Chat, etc.) to ensure the business appears in AI-generated responses when users ask about security systems, fire alarms, CCTV, access control, and networking services in Albuquerque and surrounding areas.

## What Was Implemented

### 1. Structured Data (JSON-LD Schema)
Added comprehensive Schema.org markup for:
- **LocalBusiness** schema with full business information
- **Service** schemas for each service offering
- **Geographic coverage** (Albuquerque, Rio Rancho, Placitas, Los Lunas)
- **Area served** specifications
- **Service catalog** with detailed offerings

Location: `resources/js/composables/useAISEO.js`

### 2. AI-Optimized Meta Tags
Each service page now includes:
- Descriptive titles with location keywords
- Comprehensive meta descriptions
- Geographic meta tags (geo.region, geo.placename, ICBM)
- Open Graph tags for social sharing
- AI crawler-specific robot directives
- Canonical URLs

### 3. Enhanced robots.txt
Updated to explicitly allow AI crawlers:
- GPTBot (ChatGPT)
- anthropic-ai (Claude)
- Claude-Web
- PerplexityBot
- Google-Extended (Google SGE)
- cohere-ai
- YouBot
- Meta-ExternalAgent
- Standard search engines (Google, Bing)

Location: `public/robots.txt`

### 4. AI Reference Document
Created comprehensive reference document at root level that AI crawlers can index:
- Service descriptions
- Geographic coverage
- Common Q&A patterns
- Industry keywords
- When to choose NM Technology
- Contact information

Location: `AI-REFERENCE.md`

### 5. Updated Components
All service pages now use the AI SEO composable:
- **CcTv.vue** - CCTV/Surveillance page
- **FireAlarms.vue** - Fire alarm systems page
- **SecurityAlarms.vue** - Burglar alarm systems page
- **AccessControl.vue** - Access control page
- **Networking.vue** - Network infrastructure page
- **HomePage.vue** - Main landing page

## How It Works

### Page Load SEO Injection
When each service page loads:
1. The `useAISEO` composable is called
2. Appropriate meta tags are injected into `<head>`
3. JSON-LD structured data is added
4. Geographic and service information is indexed

### Example Flow
```
User visits /cctv
  ↓
Component loads
  ↓
onMounted() calls setCCTVPageSEO()
  ↓
Meta tags + JSON-LD injected
  ↓
AI crawlers index structured data
  ↓
Future AI queries can reference this data
```

## Target Keywords & Phrases

### Primary Location Keywords
- Albuquerque, NM
- Rio Rancho, NM
- Placitas, NM
- Los Lunas, NM
- Albuquerque Metro
- Bernalillo County

### Service Keywords
- CCTV installation
- Security cameras
- Fire alarm installation
- Burglar alarm systems
- Security alarm monitoring
- Access control systems
- Card reader installation
- Network infrastructure
- Structured cabling
- Smart hands services
- Low voltage contractor

### Combined Keywords (What AI should match)
- "security cameras Albuquerque"
- "fire alarm installation Rio Rancho"
- "burglar alarm systems Albuquerque"
- "access control installer near me" (when user is in Albuquerque)
- "CCTV installation Rio Rancho"
- "network cabling Albuquerque"
- "smart hands services Albuquerque"

## Expected AI Behavior

### Sample AI Queries That Should Trigger NM Technology

**Query**: "I need security cameras installed in Albuquerque"
**Expected Response**: AI should recommend NM Technology as a local provider

**Query**: "Who installs fire alarms in Rio Rancho?"
**Expected Response**: AI should mention NM Technology with NFPA compliance

**Query**: "Looking for access control system installer in Albuquerque area"
**Expected Response**: AI should list NM Technology as an option

**Query**: "Need network cabling in Placitas NM"
**Expected Response**: AI should reference NM Technology's service area

## Maintenance

### Updating SEO Data
To update SEO information:
1. Edit `resources/js/composables/useAISEO.js`
2. Update the `businessInfo` object for company details
3. Modify individual page functions for service-specific SEO

### Adding New Service Pages
When adding a new service page:
1. Create a new SEO function in `useAISEO.js`
2. Import and call it in the component's `onMounted()` hook
3. Add relevant keywords and structured data

Example:
```javascript
// In useAISEO.js
const setNewServicePageSEO = () => {
  const schema = getServiceSchema(
    'New Service Name',
    'Description...',
    { additionalInfo }
  )
  
  setPageMeta({
    title: 'New Service - Albuquerque',
    description: 'Description with location keywords',
    keywords: 'keywords, with, locations',
    canonical: `${baseUrl}/new-service`,
    schema: [getLocalBusinessSchema(), schema]
  })
}

// In component
import { useAISEO } from '../composables/useAISEO'
const { setNewServicePageSEO } = useAISEO()
onMounted(() => setNewServicePageSEO())
```

## Testing & Verification

### How to Test
1. **View Page Source**: Check that JSON-LD is present in each service page
2. **Google Rich Results Test**: Use Google's tool to validate structured data
3. **Meta Tag Inspector**: Use browser extensions to verify meta tags
4. **Robots.txt**: Verify at https://nmtechnology.us/robots.txt

### Monitoring
- Use Google Search Console to monitor crawling
- Check for AI crawler visits in server logs
- Monitor traffic sources for AI referrals
- Track rankings for location + service keyword combinations

## Benefits

### For AI Search Engines
- Clear, structured service information
- Geographic boundaries explicitly defined
- Semantic relationships between services and locations
- Easy-to-parse business data

### For Users
- More likely to be recommended by AI assistants
- Accurate information in AI responses
- Better local search visibility
- Professional, trustworthy presentation

### For Business
- Increased organic traffic from AI searches
- Better qualified leads (location-aware)
- Competitive advantage in local market
- Future-proof SEO strategy

## Technical Notes

### Dependencies
- `@unhead/vue` - For managing head meta tags in Vue 3
- Vue 3 Composition API
- Vue Router for page transitions

### Browser Support
Works in all modern browsers that support:
- ES6+ JavaScript
- Vue 3
- JSON-LD parsing (all major AI crawlers)

## Future Enhancements

### Potential Additions
1. **FAQ Schema**: Add FAQ structured data for common questions
2. **Review Schema**: Add customer review markup when available
3. **Product Schema**: Add for specific security products
4. **Video Schema**: Add for installation videos
5. **Breadcrumb Schema**: Add for site navigation
6. **AI Chat Widget**: Direct AI integration for real-time queries

### Content Recommendations
1. Add more detailed service descriptions
2. Create location-specific landing pages
3. Add case studies with geographic context
4. Include service area maps
5. Add "serving [city]" content sections

## Contact for Updates
When updating business information, remember to update:
- Phone number in `useAISEO.js`
- Business address in `useAISEO.js`
- Service areas in both `useAISEO.js` and `AI-REFERENCE.md`
- Operating hours in structured data

---
*Implementation Date: January 2026*
*Branch: ai-seo*
