import { useState } from 'react'
import LessonForm from './components/LessonForm'
import PreviewModal from './components/PreviewModal'
import { generateLesson } from './utils/lessonGenerator'

function App() {
  const [isGenerating, setIsGenerating] = useState(false)
  const [previewData, setPreviewData] = useState(null)
  const [showPreview, setShowPreview] = useState(false)

  const handleFormSubmit = async (formData) => {
    setIsGenerating(true)
    try {
      const lessonData = await generateLesson(formData)
      setPreviewData(lessonData)
      setShowPreview(true)
    } catch (error) {
      console.error('Error generating lesson:', error)
      alert('Error generating lesson. Please try again.')
    } finally {
      setIsGenerating(false)
    }
  }

  const handleDownload = () => {
    if (previewData) {
      previewData.download()
    }
  }

  return (
    <div className="min-h-screen bg-gray-50">
      {/* Header */}
      <header className="bg-white shadow-sm border-b border-gray-200">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
          <div className="flex items-center justify-between">
            <div className="flex items-center space-x-3">
              <div className="w-8 h-8 bg-comet-600 rounded-lg flex items-center justify-center">
                <span className="text-white font-bold text-sm">M</span>
              </div>
              <div>
                <h1 className="text-2xl font-bold text-gray-900">MetEd Lesson Generator</h1>
                <p className="text-sm text-gray-600">Generate the lesson base template files</p>
              </div>
            </div>
            <div className="text-sm text-gray-500">
              v1.0.0
            </div>
          </div>
        </div>
      </header>

      {/* Main Content */}
      <main className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div className="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
          <div className="px-6 py-4 border-b border-gray-200">
            <h2 className="text-lg font-semibold text-gray-900">Create New Lesson</h2>
            <p className="text-sm text-gray-600 mt-1">
              Fill in the details below to generate your MetEd lesson package
            </p>
          </div>
          
          <div className="p-6">
            <LessonForm onSubmit={handleFormSubmit} isLoading={isGenerating} />
          </div>
        </div>
      </main>

      {/* Preview Modal */}
      {showPreview && (
        <PreviewModal
          data={previewData}
          onClose={() => setShowPreview(false)}
          onDownload={handleDownload}
        />
      )}
    </div>
  )
}

export default App