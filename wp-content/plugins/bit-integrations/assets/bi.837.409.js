import{u as S,o as b,r as o,j as s}from"./main-920.js";import"./bi.761.437.js";import{S as k}from"./bi.970.13.js";import{S as v}from"./bi.319.923.js";import{i as f}from"./bi.658.3.js";import T from"./bi.110.184.js";import{W as y}from"./bi.559.713.js";import{T as r,t as F}from"./bi.898.700.js";import"./bi.247.0.js";import"./bi.140.9.js";import"./bi.941.11.js";import"./bi.706.14.js";import"./bi.306.698.js";function $({formFields:m,setFlow:n,flow:c,allIntegURL:p}){const u=S(),{formID:d}=b(),[e,l]=o.useState(1),[x,a]=o.useState({show:!1}),[g,h]=o.useState(!1),{flowMatticLinks:t}=F,[i,j]=o.useState({name:"FlowMattic Web Hooks",type:"FlowMattic",method:"POST",url:""});return s.jsxs("div",{children:[s.jsx(k,{snack:x,setSnackbar:a}),s.jsx("div",{className:"txt-center mt-2",children:s.jsx(v,{step:2,active:e})}),s.jsxs("div",{className:"btcd-stp-page",style:{width:e===1&&1100,height:e===1&&"auto"},children:[(t==null?void 0:t.youTubeLink)&&s.jsx(r,{title:"FlowMattic",youTubeLink:t==null?void 0:t.youTubeLink}),(t==null?void 0:t.docLink)&&s.jsx(r,{title:"FlowMattic",docLink:t==null?void 0:t.docLink}),s.jsx(T,{formID:d,formFields:m,webHooks:i,setWebHooks:j,step:e,setStep:l,setSnackbar:a,create:!0})]}),s.jsx("div",{className:"btcd-stp-page",style:{width:e===2&&"100%",height:e===2&&"auto"},children:s.jsx(y,{step:e,saveConfig:()=>f(c,n,p,i,u,"","",h),isLoading:g})})]})}export{$ as default};