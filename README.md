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

## Plagiarism Checker (NewsData.io) — Quick Start

1. Clone or copy project files into a folder.

2. Create .env
   - Copy .env.example to .env
   - Set NEWSDATA_API_KEY to your NewsData.io key.

3. Install dependencies
   npm install

4. Run server (development)
   npm run dev
   or
   npm start

5. Open the frontend
   - If you placed index.html in public/, open http://localhost:3000/
   - Or open public/index.html directly in a browser (proxy requires server).

Notes:
- The frontend calls /api/news?q=... which the server proxies to NewsData.io.
- If you see CORS errors when calling NewsData directly from the browser, the proxy avoids that.
- If you hit rate limits, increase CACHE_TTL_MS in server.js or reduce chunk count in frontend.
- For production, set NEWS_API_KEY in environment variables and deploy server.js to your host.

## Structure

```
/api/news.js
/public/index.html
/public/styles.css
package.json
vercel.json   (optional)

```


## License

This project is licensed under the MIT License. See the  [LICENSE](https://github.com/sethuaung/Plagiarism-Checker/blob/main/LICENSE)  file for details.
