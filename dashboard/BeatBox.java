import javax.swing.*;
import java.awt.*;
import java.util.*;
import java.awt.event.*;
import javax.sound.midi.*;
public class BeatBox {
JPanel jPanel;
ArrayList<JCheckBox> cbList;
Sequencer sequencer;
Sequence sequence;
Track track;
JFrame jframe;
String[] insnames = {"Bass", "Closed", 
"Open","Acoustic Snare", "Crash Cymbal", "Hand Clap", 
"High Tom", "Hi Bongo", "Maracas", "Whistle", "Low Conga", 
"Cowbell", "Vibraslap", "Low-mid Tom", "High Agogo", 
"Open Hi Conga","Acoustic Snare", "Crash Cymbal", "Hand Clap", 
"High Tom", "Hi Bongo",};
int[] instruments = {35,42,46,38,49,39,50,60,70,72,64,56,58,47,67,63};
public static void main (String[] args) {
new BeatBox().buildGUI();
    }
public void buildGUI() {
        jframe = new JFrame("Punk:Java");
        jframe.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
BorderLayout layout = new BorderLayout();
JPanel bg = new JPanel(layout);
        bg.setBorder(BorderFactory.createEmptyBorder(10,10,10,10));
        cbList = new ArrayList<JCheckBox>();
Box bNox = new Box(BoxLayout.Y_AXIS);
JButton start = new JButton("Start");
        start.addActionListener(new MyStartListener());
        bNox.add(start);         
JButton stop = new JButton("Stop");
        stop.addActionListener(new MyStopListener());
        bNox.add(stop);
JButton upTempo = new JButton("Up");
        upTempo.addActionListener(new MyUpTempoListener());
        bNox.add(upTempo);
JButton downTempo = new JButton("Down");
        downTempo.addActionListener(new MyDownTempoListener());
        bNox.add(downTempo);
Box nameBox = new Box(BoxLayout.Y_AXIS);
for (int i = 0; i < 16; i++) {
           nameBox.add(new Label(insnames[i]));
        }
        bg.add(BorderLayout.EAST, bNox);
        bg.add(BorderLayout.WEST, nameBox);
        jframe.getContentPane().add(bg);
GridLayout grid = new GridLayout(16,16);
        grid.setVgap(1);
        grid.setHgap(2);
        jPanel = new JPanel(grid);
        bg.add(BorderLayout.CENTER, jPanel);
for (int i = 0; i < 256; i++) {                    
JCheckBox c = new JCheckBox();
            c.setSelected(false);
            cbList.add(c);
            jPanel.add(c);            
        } 
        setUpMidi();
        jframe.setBounds(50,50,300,300);
        jframe.pack();
        jframe.setVisible(true);
    } 
public void setUpMidi() {
try {
        sequencer = MidiSystem.getSequencer();
        sequencer.open();
        sequence = new Sequence(Sequence.PPQ,4);
        track = sequence.createTrack();
        sequencer.setTempoInBPM(120);
      } catch(Exception e) {e.printStackTrace();}
    } 
public void buildTrackAndStart() {
int[] trackList = null;
      sequence.deleteTrack(track);
      track = sequence.createTrack();
for (int i = 0; i < 16; i++) {
          trackList = new int[16];
int key = instruments[i];   
for (int j = 0; j < 16; j++ ) {         
JCheckBox jCombo = (JCheckBox) cbList.get(j + (16*i));
if ( jCombo.isSelected()) {
                 trackList[j] = key;
              } else {
                 trackList[j] = 0;
              }                    
           } // close inner loop
           makeTracks(trackList);
           track.add(makeEvent(176,1,127,0,16));  
       } // close outer
       track.add(makeEvent(192,9,1,0,15));      
try {
           sequencer.setSequence(sequence); 
	     sequencer.setLoopCount(sequencer.LOOP_CONTINUOUSLY);                   
           sequencer.start();
           sequencer.setTempoInBPM(120);
       } catch(Exception e) {e.printStackTrace();}
    } // close buildTrackAndStart method
public class MyStartListener implements ActionListener {
public void actionPerformed(ActionEvent a) {
            buildTrackAndStart();
        }
    } // close inner class
public class MyStopListener implements ActionListener {
public void actionPerformed(ActionEvent a) {
            sequencer.stop();
        }
    } // close inner class
public class MyUpTempoListener implements ActionListener {
public void actionPerformed(ActionEvent a) {
float tempoFactor = sequencer.getTempoFactor(); 
            sequencer.setTempoFactor((float)(tempoFactor * 1.03));
        }
     } // close inner class
public class MyDownTempoListener implements ActionListener {
public void actionPerformed(ActionEvent a) {
float tempoFactor = sequencer.getTempoFactor();
            sequencer.setTempoFactor((float)(tempoFactor * .97));
        }
    } // close inner class
public void makeTracks(int[] list) {        
for (int i = 0; i < 16; i++) {
int key = list[i];
if (key != 0) {
             track.add(makeEvent(144,1,key, 100, i));
             track.add(makeEvent(128,1,key, 100, i+1));
          }
       }
    }
public  MidiEvent makeEvent(int comd, int chan, int one, int two, int tick) {
MidiEvent event = null;
try {
ShortMessage a = new ShortMessage();
            a.setMessage(comd, chan, one, two);
            event = new MidiEvent(a, tick);
        } catch(Exception e) {e.printStackTrace(); }
return event;
    }
} // close class
