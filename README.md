# URL Path Parameter Tester

A simple, interactive HTML page for testing URL path parameters with dropdown selections.


## Overview

This tool allows you to:

- Create dynamic URL paths based on dropdown selections
- See URL updates in real time 
- Manually edit and apply custom URL paths
- Test hierarchical dependency between form elements

## Features

- **Four-level selection hierarchy**: Each dropdown is dependent on the previous selection
- **Real-time URL updates**: URL path changes automatically with each selection
- **Bi-directional functionality**: 
  - Selections update the URL
  - URL paths populate the selections
- **Manual URL editing**: Input field for direct URL manipulation

## How It Works

This single-page application demonstrates RESTful URL patterns through a series of dependent dropdowns:

1. Make a selection from the first dropdown
2. Each subsequent dropdown is enabled only when the previous one has a value
3. The URL updates to reflect your selections using this pattern:
   ```
   /test.php/selection1/selection2/selection3/selection4
   ```
4. When you navigate to a URL with parameters, the form fields automatically populate

## Technical Implementation

- Pure JavaScript with no external dependencies
- HTML5 History API for URL manipulation without page reload
- Event driven architecture for responsive UI updates

## Use Cases

- Testing URL parameter handling
- Demonstrating RESTful URI patterns
- Teaching URL structure concepts
- Prototyping multi-level navigation systems

## Getting Started

1. Clone this repository (git clone [(https://github.com/cyb3rhex/URL-Path-Parameter-Tester/)])
2. Host test.php to any server
3. Start making selections to see the URL update
4. Try entering a custom URL to see the selections update


---

Created by cyb3rhex - Feel free to contribute!
