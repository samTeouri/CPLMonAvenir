\documentclass[12pt,a4paper]{article}
\usepackage[utf8]{inputenc}
\usepackage{amsmath}
\usepackage{amsfonts}
\usepackage{amssymb}
\usepackage{makeidx}
\usepackage{graphicx}
\usepackage{lmodern}
\usepackage{longtable}
\usepackage[left=1cm,right=1cm,top=1cm,bottom=1cm]{geometry}
\begin{document}
\vspace{-2cm}
\begin{flushleft}
\large
\textbf{Complexe Privé Laïque\\
MON AVENIR}\\
Travail-Discipline-Succès\\
BP 68: Sokodé - Togo
\end{flushleft}

\vspace{-3.6cm}
\begin{flushright}
\large
\textbf{République Togolaise}\\
Travail -Liberté-Patrie\\
\textbf{Année Scolaire: @latex($annee->annee)}

\end{flushright}



\begin{figure}[!h]
\hspace{7.5cm}
\includegraphics[scale=0.5]{@latex($logo)}
\end{figure}



\vspace{0cm}
\begin{center}
\huge
\textbf{Liste des élèves de @latex(substr($classe->nom, 0, 6)) }
\end{center}

\vspace{0.5cm}

\begin{center}
\renewcommand{\arraystretch}{2}
\begin{longtable}{|p{0.5cm}|p{4cm}|p{6cm}|p{1cm}|p{1cm}|p{1cm}|p{1cm}|p{1cm}|p{1cm}|p{1cm}|}
\hline
\textbf{N°} & \textbf{Nom} & \textbf{Prénom} & \textbf{Sexe} & & & & \\
\hline
@php
    $i = 1;
@endphp
@foreach ($eleves as $eleve)
    \centering \textbf{@latex($i++)} & @latex($eleve->nom) & @latex($eleve->prenom) & \centering @latex($eleve->sexe) &
    & & & \\
    \hline
@endforeach

\end{longtable}
\end{center}





\end{document}
