# Proposed Website Architecture & Navigation Flow

The following flowchart illustrates the updated website structure based on the PRD requirements, including the removal of the Advisory section and the introduction of the new Blog, Newsletter, and individual Service pages.

```mermaid
graph TD
    %% Define Styles
    classDef main fill:#1A2C42,stroke:#C9A14A,stroke-width:2px,color:#fff;
    classDef page fill:#F5F5F5,stroke:#2F4A7F,stroke-width:1px,color:#1A2C42;
    classDef newPage fill:#E6F0FA,stroke:#2F4A7F,stroke-width:2px,stroke-dasharray: 5 5,color:#1A2C42;
    classDef detail fill:#FFFFFF,stroke:#64748B,stroke-width:1px,color:#64748B;
    classDef removed fill:#FFEEEE,stroke:#FF0000,stroke-width:2px,stroke-dasharray: 5 5,color:#A00000;

    %% Nodes
    Home[("Home / Landing Page")]:::main
    
    About["About Page<br/>(Updated Bios & Photos)"]:::page
    Framework["Framework Page"]:::page
    Contact["Contact Page"]:::page
    
    Services["Services Landing Page<br/>(Redesigned)"]:::page
    Serv1["Service 1 Detail"]:::detail
    Serv2["Service 2 Detail"]:::detail
    ServN["Service N Detail"]:::detail
    
    Blog["Blog Landing Page"]:::newPage
    Article1["Blog Article 1"]:::detail
    Article2["Blog Article 2"]:::detail
    
    Newsletter["Newsletter Page<br/>(Sign-up Form)"]:::newPage
    
    Advisory["Advisory Page<br/>(To Be Removed)"]:::removed

    %% Connections
    Home --> About
    Home --> Framework
    Home --> Services
    Home --> Blog
    Home --> Newsletter
    Home --> Contact
    
    %% Services Flow
    Services --> Serv1
    Services --> Serv2
    Services --> ServN
    
    %% Blog Flow
    Blog --> Article1
    Blog --> Article2
    
    %% Removed Flow
    Home -.-x Advisory
    
    %% Styling and Subgraphs
    subgraph Core Navigation
        About
        Framework
        Services
        Blog
        Newsletter
        Contact
    end
```

### Legend
- **Solid Outline (Navy):** Existing pages with updates
- **Dashed Outline (Blue):** New modules added (Blog & Newsletter)
- **Thin Outline (Grey):** Individual dynamic detail pages
- **Dashed Red:** Sections being removed (Advisory)
