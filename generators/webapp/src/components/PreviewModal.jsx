import PropTypes from 'prop-types'

const PreviewModal = ({ data, onClose, onDownload }) => {
  return (
    <div className="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
      <div className="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-[80vh] overflow-hidden">
        {/* Header */}
        <div className="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
          <h3 className="text-lg font-semibold text-gray-900">Lesson Generated Successfully</h3>
          <button
            onClick={onClose}
            className="text-gray-400 hover:text-gray-600 transition-colors"
          >
            <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        {/* Content */}
        <div className="px-6 py-4 max-h-96 overflow-y-auto">
          <div className="space-y-4">
            <div className="bg-green-50 border border-green-200 rounded-md p-4">
              <div className="flex items-center">
                <svg className="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                  <path fillRule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clipRule="evenodd" />
                </svg>
                <p className="text-green-800 font-medium">Your lesson has been generated successfully!</p>
              </div>
            </div>

            {data && (
              <div className="space-y-3">
                <h4 className="font-medium text-gray-900">Generated Files:</h4>
                <div className="bg-gray-50 rounded-md p-4">
                  <ul className="space-y-1 text-sm text-gray-700">
                    {data.files && data.files.map((file, index) => (
                      <li key={index} className="flex items-center">
                        <svg className="w-4 h-4 text-gray-400 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                          <path fillRule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clipRule="evenodd" />
                        </svg>
                        {file}
                      </li>
                    ))}
                  </ul>
                </div>

                <div className="text-sm text-gray-600">
                  <p><strong>Lesson:</strong> {data.metadata?.metedName}</p>
                  <p><strong>ID:</strong> {data.metadata?.metedID}</p>
                  <p><strong>Language:</strong> {data.metadata?.metedLang}</p>
                  <p><strong>Template:</strong> Latest Core</p>
                </div>
              </div>
            )}
          </div>
        </div>

        {/* Footer */}
        <div className="px-6 py-4 border-t border-gray-200 flex items-center justify-end space-x-3">
          <button
            onClick={onClose}
            className="px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-md font-medium transition-colors"
          >
            Close
          </button>
          <button
            onClick={onDownload}
            className="px-4 py-2 bg-comet-600 text-white hover:bg-comet-700 rounded-md font-medium transition-colors flex items-center"
          >
            <svg className="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Download ZIP
          </button>
        </div>
      </div>
    </div>
  )
}

PreviewModal.propTypes = {
  data: PropTypes.shape({
    files: PropTypes.array,
    metadata: PropTypes.shape({
      metedName: PropTypes.string,
      metedID: PropTypes.string,
      metedLang: PropTypes.string
    })
  }),
  onClose: PropTypes.func.isRequired,
  onDownload: PropTypes.func.isRequired
}

export default PreviewModal