// Template Collections Index
// This file provides access to all available template collections

// Import template collections
import * as latestCore2026 from './latest_core_2026/index.js'

// Export collections by template type
export const templateCollections = {
  'latest_core_2026': latestCore2026,
  'absorb-2025': latestCore2026 // Alias for backward compatibility
}

// Default export is the latest core templates
export const {
  indexTemplate,
  downloadTemplate,
  pageTemplateTemplate,
  mediaGalleryTemplate,
  printTemplate
} = latestCore2026

// Helper function to get templates by type
export function getTemplateCollection(templateType = 'latest_core_2026') {
  return templateCollections[templateType] || templateCollections['latest_core_2026']
}