<!DOCTYPE html>
<html>
  <head>
    <title><?= esc($elecDetails['title'])?> Results</title>
    <style>
      table {
        font-family: lato, sans-serif;
        border-collapse: collapse;
        width: 100%;
        margin: auto;
        border-radius: 100px;
      }

      h2 {
        text-align: center;
        font-family: lato;
        font-weight: 300;
        /* font-color: white; */
        text-transform: uppercase;
      }

      th{
        border: 1px solid #5DB1D1;
        text-align: center;
        padding-left: 10px;
        padding-top: 10px;
        padding-bottom: 10px;
        background-color:  #5DB1D1;
        color: #fff;
      }

      td{
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }

      tr:nth-child(even) {
        background-color: #ccd9d7;
      }
    </style>
  </head>
  <body>
    <h2><?= esc($elecDetails['title'])?> Votes</h2>
    <table>
      <tr>
        <th>Candidate Name</th>
        <th>Number of Votes</th>
      </tr>
      <?php foreach($positions as $position):?>
        <?php $posTotalVotes = 0;?>
        <tr>
            <td colspan="2"><?= esc($position['name'])?></td>
        </tr>
        <?php foreach($candidates as $candidate):?>
        <tr>
            <?php $voteCount = 0;?>
            <td style="text-align: center;"><?= esc($candidate['first_name'])?> <?= esc($candidate['last_name'])?></td>
            <?php foreach($voteDetails as $voteDetail){
              if(($candidate['id'] && $position['id']) == ($voteDetail['candidate_id'] &&$voteDetail['position_id'])) {
                $voteCount++;
                $posTotalVotes++;
              }
            }?>
            <td><?= esc($voteCount)?></td>
        </tr>
        <?php endforeach;?>
        <tr>
          <?php $voteCount = 0;?>
          <td style="text-align: center;">Abstain</td>
          <?php foreach($voteDetails as $voteDetail){
            if($voteDetail['candidate_id'] == '0' && $voteDetail['position_id'] == $position['id']) {
              $voteCount++;
              $posTotalVotes++;
            }
          }?>
          <td><?= esc($voteCount)?></td>
        </tr>
        <tr><td><br></td></tr> 
        <tr>
            <td style="text-align: center;">Total Votes</td>
            <td><?= $posTotalVotes;?></td>
        </tr>
      <?php endforeach;?>
    </table>
  </body>
</html>