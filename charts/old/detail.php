<?php
    $con=mysqli_connect("localhost","tjhacker","tj2014NOVA","nsf");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $loc = $_GET["name"];
    echo $loc . "<br><br>";
    
    $query = "select t.awardid as Award, t.patentnum as PatentNumber from patenttoaward t, patent2013 p, institution i where i.name = '" . $loc . "' and i.awardid = t.awardid and t.patentnum = p.patentno;";
    
    $result = mysqli_query($con, $query);
    //echo $query;
    
    echo "<table> <td valign=top>";
    
    echo "<span style=display:inline-block float:left><table border='1'><tr><th>Grant ID</th><th>PatentNum</th></tr>";
    
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td> <center> <a href = http://www.nsf.gov/awardsearch/showAward?AWD_ID=" . $row['Award'] . "&HistoricalAwards=false>" . $row['Award'] . "</a> </center> </td>";
        echo "<td> <center> <a href = http://www.google.com/patents/US" . $row['PatentNumber'] . ">" . $row['PatentNumber'] . "</a> </center> </td>";
        echo "</tr>";
    }
    
    echo "</table> </span>";
    echo "</td>";
    
    echo "<td valign=top>";
    
    echo "<span style=display:inline-block float:right> <iframe width=800 height=800 scrolling=no frameborder=no src=https://www.google.com/fusiontables/embedviz?containerId=googft-gviz-canvas&amp;viz=GVIZ&amp;t=GRAPH&amp;gc=true&amp;gd=true&amp;sdb=1&amp;rmax=100000&amp;uiversion=2&amp;q=select+col0%2C+col1+from+1UyVORZEOUtDOxPBOkTE6lXg02a7foVmu-mqTGkax+where+col0+contains+ignoring+case+&#39;" . str_replace(" ", "+", $loc) . "&#39;&amp;qrs=+and+col0+%3E%3D+&amp;qre=+and+col0+%3C%3D+&amp;qe=&amp;state=%7B%22ps%22%3A%221_0_38_-n_7_29_-a_k_2k_-15_a_3c_7_1_3s_0_2_2w_7_4_2x_-1h_5_3k_-1g_n_47_-t_h_47_-i_j_3w_-1d_b_44_-7_i_43_-14_9_39_-1n_8_2y_-1x_d_45_b_6_4d_1_c_2h_-1q_r_4i_-c_3_2r_m_o_36_p_f_3j_-1x_g_48_-1h_m_3v_j_q_4j_-q_p_3j_n_l_3w_-1r_e_4g_-14_%22%2C%22cx%22%3A100.50752333699452%2C%22cy%22%3A1.0827902427663254%2C%22sw%22%3A1449.9570458644641%2C%22sh%22%3A601.3057160790867%2C%22z%22%3A1.498192015567905%7D&amp;gco_forceIFrame=true&amp;gco_hasLabelsColumn=true&amp;width=700&amp;height=700></iframe> </span>";
    
    echo "</td> </table>";
    
    mysqli_close($con);
    ?>




