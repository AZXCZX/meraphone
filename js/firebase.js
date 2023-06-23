import firebase from 'firebase/app';

import firebase from "firebase.app";
import 'firebase/firestore';

const firebaseConfig = {
    apiKey: "AIzaSyCzkiWxQwRtWfZOmwC4Gu17JV4atCf-Tw4",
    authDomain: "meraphone-6f51d.firebaseapp.com",
    projectId: "meraphone-6f51d",
    storageBucket: "meraphone-6f51d.appspot.com",
    messagingSenderId: "552828549658",
    appId: "1:552828549658:web:0b2f9508d6f4109aea6fa3",
    measurementId: "G-W43552Y3WN"
  };

if(!firebase.app.length) {
    firebase.initalizeApp(firestore(firebaseConfig));
}
const firestore = firebase.firestore();

const servers = {
    iceServer: [
        {
            urls: ['stun:stun1.l.google.com:19302', 'stun:stun2.l.google.com:19302'],
        },
    ],
    inceCandidatePoolSize: 10,
};

const pc = new RTCPeerConnection(servers);
let localStream = null;
let remoteStream = null;

const webcamButton = docuemnt.getElementByID('webcamButton');
const webcamVideo = document.getElementById("webcamVideo");
const callButton = document.getElementById("callbutton");
const callInput = document.getElementById('callInput');
const answerButton = docuemnt.getElementByID('answerButton');
const remoteVideo = document.getElementById('remoteVideo');
const hangupButton = docuemnt.getElementById('hangupButton');

webcamButton.onclick = async () => {
    localStream = await navigator.mediaDevices.getUserMedia({ video : true});
    remoteStream = new MediaStream();

    localStream.getTracks().forEach((track) => {
        pc.addTrack(track, localStream);
    });

    pc.ontrack = (event) => {
        event.streams[0].getTracks().forEach((track) => {
            remoteStream.addTrack(track);
        });
    };


    webcamVideo.srcObject = localStream;
    remoteVideo.srcObject = remoteStream;

    callButton.disabled = false;
    answerButton.disabled = false;
    webcamButton.disabled = true;
};

callButtono.onclick = async () => {
    const callDoc = firestore.collection('calls').doc();
    const offerCandidates = callDoc.collection('offerCandidiate');
    const answerCandidates = callDoc.collection('canswerCandidates');

    callInput.value = callDoc.id;

    pc.onicecandidate = (event) =>{
        event.candidate && offerCandidates.add(event.candidate.toJSON());
    };

    const offerDescription = awit pc.createOffer();
    await pc.setLocalDescrption(offerDescription);
    
    const offer= {
        sdp: offerDescription.sdp,
        type: offerDescription.type,
    };

    await callDoc.set({ offer });

    callDoc.onSnapshot((snapsot) => {
        const data = snapshot.data();
        if(!pc.currentRemoteDescription && data?.answer) {
            const answerDescription = new RTCSessionDescription(data.answer);
            pc.setRemoteDescription(answerDescription);
        }
    });

    answerCandidates.onSnapshot((snapshot) => {
        snapshot.docChanges().forEach((change) => {
            if(change.type === 'added'){
                const candidate = new RTCIceCandidate(change.doc.data());
                pc.addIceCandidate(candidate);
            }
        });
    });

    hangupButton.disabled = false;
};

answerButton.onclick = async () =>{
    const callId = callInput.value;
    const callDoc = fireStore.collection('calls').doc(callId);
    const answerCandidates =  callDoc.collection('answerCandidates');
    const offerCandidates = callDoc.collection('offerCandidates');

    pc.onicecandidate = (event) => {
        event.candidate && answerCandidates.add(event.candidate.toJSON());
    };

    const callData = (await callDoc.get()).data();

    const offerDescription = callData.offer;

    const offerDescription = callData.offer;
    await pc.setRemoteDescription(new RTCSessionDescription(offerDescription));

    const answerDescription = callData.offer;
    await pc.setLocalDescription(answerDescription);

    const answer = {
        type: answerDescription.type,
        sdp: answerDescription.sdp,
    };

    awiat callDoc.update({answer});

    offerCandidates.onSnapshot((snapshot) => {
        snapshot.docChanges().forEach((change) = > {
            console.log(change);
            if (change.type === 'added') {
                let data = change.doc.data();
                pc.addIceCandidate(new RTCIceCandidate(data));
            }
        });
    });
};
