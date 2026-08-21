# Plagiarism Checker (Sample)

##  📝 About This Tool

Our plagiarism checker helps ensure originality and proper citation in your work. It offers two simple ways to detect overlaps with online sources:

-   **User Input Checker** Paste or type text directly into the tool. It quickly scans web sources, highlights matching snippets, and provides a plagiarism score with a clear visual meter.
    
-   **PDF Upload Checker** Upload full documents in PDF format. The tool extracts text, shows parsing progress, and checks each section for overlaps. Results include per‑page scores and matched sources.

## 🛠️ Core Components

-   **Tailwind UI** For styling and layout. You’ll use Tailwind classes to create a clean, responsive interface with input fields, buttons, and result cards.
    
-   **Google Search API** To query the web for matching text snippets. You’ll send the user’s input text to the API, retrieve search results, and analyze similarity.
    
-   **Text Comparison Logic** Use string similarity algorithms (e.g., cosine similarity, Jaccard index, Levenshtein distance) to compare the input text against search results.
    

## ⚙️ Workflow

1.  **User Input**
    
    -   A text area styled with Tailwind where users paste their content.
        
2.  **Search Query**
    
    -   Send chunks of the text to the Google Search API.
        
    -   Retrieve top results (titles, snippets, URLs).
        
3.  **Similarity Check**
    
    -   Compare the input text with snippets returned.
        
    -   Highlight matched phrases.
        
4.  **Results Display**
    
    -   Show a plagiarism percentage.
        
    -   List sources with links.
        
    -   Use Tailwind UI cards or tables for clarity.


## License

This project is licensed under the MIT License. See the  [LICENSE](https://github.com/sethuaung/Plagiarism-Checker/blob/main/LICENSE)  file for details.
