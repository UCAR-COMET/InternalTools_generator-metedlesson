// Template Collections Index
// This file provides access to all available template collections

// Import template collections
import * as latestCore from './latest_core/index.js'

// Export collections by template type
export const templateCollections = {
  'latest_core': latestCore,
  'absorb-2025': latestCore // Alias for backward compatibility
}

// Default export is the latest core templates
export const {
  indexTemplate,
  pageTemplateTemplate,
  mediaGalleryTemplate,
  navmenuTemplate,
} = latestCore

// Helper function to get templates by type
export function getTemplateCollection(templateType = 'latest_core') {
  return templateCollections[templateType] || templateCollections['latest_core']
}