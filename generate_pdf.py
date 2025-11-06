#!/usr/bin/env python3
"""
PDF Generator for JOURNEYWAYS Game Rules
Converts the rules.html page to a well-formatted PDF document.
"""

import os
import sys
from weasyprint import HTML, CSS
from weasyprint.text.fonts import FontConfiguration

def generate_pdf():
    """Generate PDF from the rules.html file."""
    
    # Define file paths
    html_file = '/var/www/www.journeywaysgame.com/rules.html'
    output_file = '/var/www/www.journeywaysgame.com/JOURNEYWAYS_Game_Rules.pdf'
    
    # Check if HTML file exists
    if not os.path.exists(html_file):
        print(f"Error: HTML file not found at {html_file}")
        return False
    
    try:
        # Create font configuration for better font handling
        font_config = FontConfiguration()
        
        # Define custom CSS for PDF optimization
        pdf_css = CSS(string='''
            @page {
                size: A4;
                margin: 1in;
                @top-center {
                    content: "JOURNEYWAYS - Game Rules";
                    font-size: 10pt;
                    color: #666;
                }
                @bottom-center {
                    content: "Page " counter(page);
                    font-size: 10pt;
                    color: #666;
                }
            }
            
            body {
                font-family: 'Arial', sans-serif;
                line-height: 1.6;
                color: #333;
                background: white;
            }
            
            .script-font {
                font-family: 'Georgia', serif;
                font-weight: bold;
            }
            
            h1 {
                color: #f59e0b;
                font-size: 2.5em;
                margin-bottom: 0.5em;
                text-align: center;
            }
            
            h2 {
                color: #f59e0b;
                font-size: 2em;
                margin-top: 1.5em;
                margin-bottom: 0.8em;
                border-bottom: 2px solid #f59e0b;
                padding-bottom: 0.3em;
            }
            
            h3 {
                color: #f59e0b;
                font-size: 1.5em;
                margin-top: 1.2em;
                margin-bottom: 0.6em;
            }
            
            h4 {
                color: #374151;
                font-size: 1.2em;
                margin-top: 1em;
                margin-bottom: 0.5em;
            }
            
            h5 {
                color: #f59e0b;
                font-size: 1.1em;
                margin-bottom: 0.4em;
            }
            
            .rule-section {
                background: #f8f9fa;
                border: 1px solid #e5e7eb;
                border-radius: 8px;
                padding: 1.5em;
                margin-bottom: 1.5em;
                page-break-inside: avoid;
            }
            
            .card-black { color: #6b7280; font-weight: bold; }
            .card-blue { color: #3b82f6; font-weight: bold; }
            .card-green { color: #10b981; font-weight: bold; }
            .card-purple { color: #8b5cf6; font-weight: bold; }
            .card-red { color: #ef4444; font-weight: bold; }
            
            ul, ol {
                margin-left: 1.5em;
                margin-bottom: 1em;
            }
            
            li {
                margin-bottom: 0.3em;
            }
            
            .grid {
                display: block;
            }
            
            .md\\:grid-cols-2 > div,
            .md\\:grid-cols-3 > div {
                margin-bottom: 1em;
                page-break-inside: avoid;
            }
            
            .bg-gray-700 {
                background: #e5e7eb;
                padding: 1em;
                border-radius: 6px;
                margin-bottom: 1em;
            }
            
            .text-center {
                text-align: center;
            }
            
            .text-xl {
                font-size: 1.25em;
            }
            
            .text-lg {
                font-size: 1.125em;
            }
            
            .text-sm {
                font-size: 0.875em;
            }
            
            .mb-4 { margin-bottom: 1em; }
            .mb-6 { margin-bottom: 1.5em; }
            .mb-8 { margin-bottom: 2em; }
            .mb-16 { margin-bottom: 4em; }
            
            .mt-4 { margin-top: 1em; }
            .mt-6 { margin-top: 1.5em; }
            .mt-8 { margin-top: 2em; }
            
            .py-20 { padding: 5em 0; }
            .py-8 { padding: 2em 0; }
            
            .px-4 { padding-left: 1em; padding-right: 1em; }
            .px-8 { padding-left: 2em; padding-right: 2em; }
            
            .max-w-6xl { max-width: 72rem; }
            .max-w-4xl { max-width: 56rem; }
            .mx-auto { margin-left: auto; margin-right: auto; }
            
            .space-y-2 > * + * { margin-top: 0.5em; }
            .space-y-4 > * + * { margin-top: 1em; }
            .space-y-6 > * + * { margin-top: 1.5em; }
            
            .gap-4 { gap: 1em; }
            .gap-6 { gap: 1.5em; }
            .gap-8 { gap: 2em; }
            
            /* Hide navigation and footer elements for PDF */
            nav, footer, .hero-bg {
                display: none;
            }
            
            /* Ensure proper page breaks */
            .rule-section {
                page-break-inside: avoid;
            }
            
            h1, h2, h3 {
                page-break-after: avoid;
            }
            
            /* Print-specific styles */
            @media print {
                body {
                    background: white;
                    color: black;
                }
                
                .rule-section {
                    border: 1px solid #ccc;
                    background: #f9f9f9;
                }
            }
        ''', font_config=font_config)
        
        # Generate PDF
        print("Generating PDF from rules.html...")
        HTML(filename=html_file).write_pdf(
            output_file, 
            stylesheets=[pdf_css],
            font_config=font_config
        )
        
        print(f"PDF successfully generated: {output_file}")
        return True
        
    except Exception as e:
        print(f"Error generating PDF: {str(e)}")
        return False

if __name__ == "__main__":
    success = generate_pdf()
    sys.exit(0 if success else 1)


