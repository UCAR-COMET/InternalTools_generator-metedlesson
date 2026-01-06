import { useState } from 'react'
import PropTypes from 'prop-types'

const LessonForm = ({ onSubmit, isLoading }) => {
  const [formData, setFormData] = useState({
    templateType: 'absorb-2025',
    metedLang: 'EN',
    metedName: 'Lesson Title Here',
    metedID: '',
    metedDesc: '',
    metedKeys: '',
    metedPath: '/example/path/',
    hasAdditionalOptions: false,
    customYear: new Date().getFullYear().toString(),
    splashImageCredit: 'The COMET Program',
    narratedLesson: false
  })

  const [showAdditional, setShowAdditional] = useState(false)

  const handleInputChange = (e) => {
    const { name, value, type, checked } = e.target
    setFormData(prev => ({
      ...prev,
      [name]: type === 'checkbox' ? checked : value
    }))
  }

  const handleAdditionalToggle = (e) => {
    const checked = e.target.checked
    setShowAdditional(checked)
    setFormData(prev => ({
      ...prev,
      hasAdditionalOptions: checked
    }))
  }

  const handleSubmit = (e) => {
    e.preventDefault()
    onSubmit(formData)
  }

  return (
    <form onSubmit={handleSubmit} className="space-y-6">
      {/* Template Type */}
      <div>
        <label className="block text-sm font-medium text-gray-700 mb-2">
          Template Type
        </label>
        <select
          name="templateType"
          value={formData.templateType}
          onChange={handleInputChange}
          className="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-comet-500 focus:border-transparent"
          disabled
        >
          <option value="absorb-2025">Latest Core 2026</option>
        </select>
        <p className="mt-1 text-xs text-gray-500">Currently only Latest Core 2026 is supported</p>
      </div>

      {/* Language */}
      <div>
        <label className="block text-sm font-medium text-gray-700 mb-2">
          Lesson Language
        </label>
        <select
          name="metedLang"
          value={formData.metedLang}
          onChange={handleInputChange}
          className="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-comet-500 focus:border-transparent"
        >
          <option value="EN">English</option>
          <option value="ES">Spanish</option>
          <option value="FR">French</option>
        </select>
      </div>

      {/* Lesson Name */}
      <div>
        <label className="block text-sm font-medium text-gray-700 mb-2">
          Lesson Title *
        </label>
        <input
          type="text"
          name="metedName"
          value={formData.metedName}
          onChange={handleInputChange}
          className="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-comet-500 focus:border-transparent"
          required
        />
      </div>

      {/* Lesson ID */}
      <div>
        <label className="block text-sm font-medium text-gray-700 mb-2">
          Lesson ID *
        </label>
        <input
          type="number"
          name="metedID"
          value={formData.metedID}
          onChange={handleInputChange}
          className="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-comet-500 focus:border-transparent"
          required
        />
      </div>

      {/* Description */}
      <div>
        <label className="block text-sm font-medium text-gray-700 mb-2">
          Lesson Description
        </label>
        <textarea
          name="metedDesc"
          value={formData.metedDesc}
          onChange={handleInputChange}
          rows="3"
          className="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-comet-500 focus:border-transparent"
          placeholder="Enter a brief description of the lesson..."
        />
      </div>

      {/* Keywords */}
      <div>
        <label className="block text-sm font-medium text-gray-700 mb-2">
          Keywords
        </label>
        <input
          type="text"
          name="metedKeys"
          value={formData.metedKeys}
          onChange={handleInputChange}
          className="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-comet-500 focus:border-transparent"
          placeholder="Enter keywords separated by commas..."
        />
        <p className="mt-1 text-xs text-gray-500">Separate multiple keywords with commas</p>
      </div>

      {/* MetEd Path */}
      <div>
        <label className="block text-sm font-medium text-gray-700 mb-2">
          MetEd Lesson Path Structure *
        </label>
        <input
          type="text"
          name="metedPath"
          value={formData.metedPath}
          onChange={handleInputChange}
          className="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-comet-500 focus:border-transparent"
          placeholder="/example/path/"
          required
        />
        <p className="mt-1 text-xs text-gray-500">Should start and end with forward slashes</p>
      </div>

      {/* Additional Options Toggle */}
      <div className="flex items-center">
        <input
          type="checkbox"
          id="hasAdditionalOptions"
          name="hasAdditionalOptions"
          checked={formData.hasAdditionalOptions}
          onChange={handleAdditionalToggle}
          className="h-4 w-4 text-comet-600 focus:ring-comet-500 border-gray-300 rounded"
        />
        <label htmlFor="hasAdditionalOptions" className="ml-2 block text-sm text-gray-700">
          Include additional options (copyright year, image credit, narration switch)
        </label>
      </div>

      {/* Additional Options */}
      {showAdditional && (
        <div className="bg-gray-50 p-4 rounded-md space-y-4">
          <h3 className="text-sm font-medium text-gray-900">Additional Options</h3>
          
          {/* Custom Year */}
          <div>
            <label className="block text-sm font-medium text-gray-700 mb-2">
              Copyright Year(s)
            </label>
            <input
              type="text"
              name="customYear"
              value={formData.customYear}
              onChange={handleInputChange}
              className="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-comet-500 focus:border-transparent"
            />
          </div>

          {/* Splash Image Credit */}
          <div>
            <label className="block text-sm font-medium text-gray-700 mb-2">
              Splash Image Credit
            </label>
            <input
              type="text"
              name="splashImageCredit"
              value={formData.splashImageCredit}
              onChange={handleInputChange}
              className="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-comet-500 focus:border-transparent"
            />
          </div>

          {/* Narrated Lesson Switch */}
          <div className="flex items-center">
            <input
              type="checkbox"
              id="narratedLesson"
              name="narratedLesson"
              checked={formData.narratedLesson}
              onChange={handleInputChange}
              className="h-4 w-4 text-comet-600 focus:ring-comet-500 border-gray-300 rounded"
            />
            <label htmlFor="narratedLesson" className="ml-2 block text-sm text-gray-700">
              Include Narrated/Text switch button
            </label>
          </div>
        </div>
      )}

      {/* Submit Button */}
      <div className="pt-6 border-t border-gray-200">
        <button
          type="submit"
          disabled={isLoading}
          className="w-full bg-comet-600 text-white py-3 px-4 rounded-md font-medium hover:bg-comet-700 focus:outline-none focus:ring-2 focus:ring-comet-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed transition-colors"
        >
          {isLoading ? (
            <div className="flex items-center justify-center">
              <div className="w-5 h-5 border-2 border-white border-t-transparent rounded-full animate-spin mr-2"></div>
              Generating Lesson...
            </div>
          ) : (
            'Generate Lesson'
          )}
        </button>
      </div>
    </form>
  )
}

LessonForm.propTypes = {
  onSubmit: PropTypes.func.isRequired,
  isLoading: PropTypes.bool.isRequired
}

export default LessonForm