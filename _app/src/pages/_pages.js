import Vue from 'vue'

//Automatic global registration of Pages 
const requireComponent = require.context(
  // Look for files in the current directory
  '.',
  // look in subdirectories
  true,
  // Only include .vue files
  /[\w-]+\.vue$/
)

// For each matching file name...
requireComponent.keys().forEach(fileName => {
  // Get the component config
  const componentConfig = requireComponent(fileName)
  // Get the PascalCase version of the component name
  fileName = fileName.split("/").pop();
  const componentName = fileName
        // Remove the file extension from the end
        .replace(/\.\w+$/, '')
    
  // Globally register the component
  Vue.component(componentName, componentConfig.default || componentConfig)
})